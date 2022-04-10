<?php
namespace SiteGround_Optimizer\Images_Optimizer;

use SiteGround_Optimizer\Supercacher\Supercacher;
use SiteGround_Optimizer\Options\Options;
use SiteGround_Optimizer\Front_End_Optimization\Front_End_Optimization;
use SiteGround_Helper\Helper_Service;

/**
 * SG Images_Optimizer main plugin class
 */
class Images_Optimizer extends Abstract_Images_Optimizer {
	/**
	 * Set max image width. Default is 2560.
	 *
	 * @since 6.0.0
	 *
	 * @var int max width value.
	 */
	const MAX_IMAGE_WIDTH = 2560;

	/**
	 * Array containing options used for status updates.
	 *
	 * @var array
	 */
	public $options_map = array(
		'completed' => 'siteground_optimizer_image_optimization_completed',
		'status'    => 'siteground_optimizer_image_optimization_status',
		'stopped'   => 'siteground_optimizer_image_optimization_stopped',
	);

	/**
	 * The type of image optimization.
	 *
	 * @var string
	 */
	public $type = 'image';

	/**
	 * The total non-optimized images option.
	 *
	 * @var string
	 */
	public $non_optimized = 'siteground_optimizer_total_unoptimized_images';

	/**
	 * The batch name
	 *
	 * @var string
	 */
	public $batch_skipped = 'siteground_optimizer_is_optimized';

	/**
	 * The ajax action we are using.
	 *
	 * @var string
	 */
	public $action = 'siteground_optimizer_start_image_optimization';

	/**
	 * Array containing all process
	 *
	 * @var array
	 */
	public $process_map = array(
		'filter'   => 'siteground_optimizer_image_optimization_timeout',
		'attempts' => 'siteground_optimizer_optimization_attempts',
		'failed'   => 'siteground_optimizer_optimization_failed',
	);

	/**
	 * The type of cron we want to fire.
	 *
	 * @var string
	 */
	public $cron_type = 'siteground_optimizer_start_image_optimization_cron';

	/**
	 * The process lock we are using.
	 *
	 * @var string
	 */
	public $process_lock = 'siteground_optimizer_image_optimization_lock';

	/**
	 * The map for the compression levels for different file types.
	 *
	 * @var array
	 */
	public $compression_level_map = array(
		// IMAGETYPE_GIF.
		1 => array(
			'1'    => '-O1', // Low.
			'2' => '-O2', // Medium.
			'3'   => '-O3', // High.
		),
		// IMAGETYPE_JPEG.
		2 => array(
			'1'    => '-m85', // Low.
			'2' => '-m60', // Medium.
			'3'   => '-m20', // High.
		),
		// IMAGETYPE_PNG.
		3 => array(
			'1'    => '-o1',
			'2' => '-o2',
			'3'   => '-o3',
		),
	);

	/**
	 * Optimize the image
	 *
	 * @since  5.0.0
	 *
	 * @param  int   $id       The image id.
	 * @param  array $metadata The image metadata.
	 *
	 * @return bool     True on success, false on failure.
	 */
	public function optimize( $id, $metadata ) {
		// Load the uploads dir.
		$upload_dir = wp_get_upload_dir();
		// Get path to main image.
		$main_image = get_attached_file( $id );

		// Bail if the override is disabled and the image has a custom compression level.
		if (
			1 !== intval( get_option( 'siteground_optimizer_overwrite_custom' ) ) &&
			! empty( get_post_meta( $id, 'siteground_optimizer_compression_level', true ) )
		) {
			return false;
		}

		// Get the basename.
		$basename = basename( $main_image );
		// Get the command placeholder. It will be used by main image and to optimize the different image sizes.
		$status = $this->execute_optimization_command( $main_image );

		// Optimization failed.
		if ( true === boolval( $status ) ) {
			update_post_meta( $id, 'siteground_optimizer_optimization_failed', 1 );
			return false;
		}

		// Check if there are any sizes.
		if ( ! empty( $metadata['sizes'] ) ) {
			// Loop through all image sizes and optimize them as well.
			foreach ( $metadata['sizes'] as $size ) {
				// Replace main image with the cropped image and run the optimization command.
				$status = $this->execute_optimization_command( str_replace( $basename, $size['file'], $main_image ) );

				// Optimization failed.
				if ( true === boolval( $status ) ) {
					update_post_meta( $id, 'siteground_optimizer_optimization_failed', 1 );
					return false;
				}
			}
		}

		// Everything ran smoothly.
		update_post_meta( $id, 'siteground_optimizer_is_optimized', 1 );
		return true;
	}

	/**
	 * Resize the uploaded image if width is greather than allowed.
	 *
	 * @since 6.0.0
	 *
	 * @param array $image_data - contains file, url, type.
	 */
	public function resize( $image_data ) {
		// Using default WordPress editor.
		$editor = wp_get_image_editor( $image_data['file'] );

		if ( is_wp_error( $editor ) ) {
			return $image_data;
		}

		// Getting the image size.
		$original_size = $editor->get_size();

		// Setting the max allowed width.
		$max_allowed_width = intval( apply_filters( 'sgo_set_max_image_width', self::MAX_IMAGE_WIDTH ) );

		// Set the max allowed dementions to 1200 if adjusted to lower values.
		$max_allowed_width = $max_allowed_width < 1200 ? 1200 : $max_allowed_width;

		// Bail if image is within the allowed size.
		if ( $original_size['width'] < $max_allowed_width ) {
			return $image_data;
		}

		// Resize the image.
		$editor->resize( $max_allowed_width, false );

		// Save the scaled image.
		$editor->save( $image_data['file'] );

		// Return the scaled image to WordPress.
		return $image_data;
	}

	/**
	 * Check if image exists and perform optimiation.
	 *
	 * @since  5.0.0
	 *
	 * @param  string $filepath The path to the file.
	 *
	 * @return bool             False on success, true on failure.
	 */
	private function execute_optimization_command( $filepath, $compression_level = null ) {
		// Bail if the file doens't exists.
		if ( ! file_exists( $filepath ) ) {
			return true;
		}

		// Get option for the selected compression level.
		$compression_level = is_null( $compression_level ) ? intval( get_option( 'siteground_optimizer_compression_level' ) ) : $compression_level;

		// Bail if compression level is set to None.
		if ( 0 === $compression_level ) {
			return true;
		}

		$backup_filepath = preg_replace( '~.(png|jpg|jpeg|gif)$~', '.bak.$1', $filepath );

		if (
			Options::is_enabled( 'siteground_optimizer_backup_media' ) &&
			! file_exists( $backup_filepath )
		) {
			copy( $filepath, $backup_filepath );
		}

		$status = $this->optimize_image(
			file_exists( $backup_filepath ) ? $backup_filepath : $filepath,
			$compression_level
		);

		// Create webp copy of the webp is enabled.
		if ( Options::is_enabled( 'siteground_optimizer_webp_support' ) ) {
			Images_Optimizer_Webp::generate_webp_file( $filepath );
		}

		return $status;
	}

	/**
	 * Optimize the image.
	 *
	 * @since  6.0.0
	 *
	 * @param  string $filepath The image filepath.
	 * @param  int    $level    The optimization level.
	 *
	 * @return string           The status code.
	 */
	public function optimize_image( $filepath, $level ) {
		// Get image type.
		$type = exif_imagetype( $filepath );

		$output_filepath = preg_replace( '~\.bak.(png|jpg|jpeg|gif)$~', '.$1', $filepath );

		switch ( $type ) {
			case IMAGETYPE_GIF:
				$placeholder = 'gifsicle %s --careful %s -o %s 2>&1';
				break;

			case IMAGETYPE_JPEG:
				// DO NOT REMOVE THE LINE BELOW!
				// The jpegoptim doesn't support input/output params, so we need to create a backup of the original image.
				copy( $filepath, $output_filepath );
				$placeholder = 'jpegoptim %1$s %3$s 2>&1';
				break;

			case IMAGETYPE_PNG:
				// Bail if the image is bigger than 500k.
				// PNG usage is not recommended and images bigger than 500kb
				// hit the limits.
				if ( filesize( $filepath ) > self::PNGS_SIZE_LIMIT ) {
					return true;
				}
				$placeholder = 'optipng %s %s -out=%s 2>&1';
				break;

			default:
				// Bail if the image type is not supported.
				return true;
		}

		// Optimize the image.
		exec(
			sprintf(
				$placeholder, // The command.
				$this->compression_level_map[ $type ][ $level ], // The compression level.
				$filepath, // Image path.
				$output_filepath // New Image path.

			),
			$output,
			$status
		);

		return $status;
	}


	/**
	 * Optimize the preview image.
	 *
	 * @since  6.0.0
	 *
	 * @param  int $id The attachment id.
	 */
	public function get_preview_images( $id ) {
		$filepath = ! empty( $id ) ? get_attached_file( $id ) : \SiteGround_Optimizer\DIR . '/assets/images/preview.jpg';

		$urls = array(
			0 => array(
				'compression' => 0,
				'url'         => str_replace( ABSPATH, Helper_Service::get_home_url(), $filepath ),
				'size'        => $this->get_human_readable_size( $filepath ),
			),
		);

		$output_dir = Front_End_Optimization::get_instance()->get_assets_dir() . 'previews/';

		$basename = basename( $filepath );

		if ( ! is_dir( $output_dir ) ) {
			Front_End_Optimization::get_instance()->create_directory( $output_dir );
		}

		foreach ( $this->compression_level_map as $type => $levels ) {
			// Generate output folder.
			$output = $output_dir . $basename;

			// Copy the image.
			copy( $filepath, $output );

			$this->optimize_image( $output, $type );

			$new_filename = str_replace( basename( $output ), $type . '-' . $basename, $output );

			rename( // phpcs:ignore
				$output,
				$new_filename
			);

			$urls[ $type ]['url']         = str_replace( ABSPATH, Helper_Service::get_home_url(), $new_filename );
			$urls[ $type ]['compression'] = intval( $type );
			$urls[ $type ]['size']        = $this->get_human_readable_size( $new_filename );
		}

		return $urls;
	}

	/**
	 * Get a human readable string containing information regarding the size of a file.
	 *
	 * @since 6.0.0
	 *
	 * @param string $filepath The path of the file that has to be sized.
	 *
	 * @return string          The human-readable string with the size of the file.
	 */
	public function get_human_readable_size( $filepath ) {
		// Get the size of the file in bytes.
		$size = filesize( $filepath );
		// Possible unit types.
		$units = array( 'B', 'kB', 'MB' );
		$step = 1024;
		$i = 0;

		// Divide the size until it's less than 1 to find the correct unit.
		while ( ( $size / $step ) > 0.9 ) {
			$size = $size / $step;
			$i++;
		}
		// Return the human readable string.
		return round( $size, 2 ) . $units[ $i ];
	}

	/**
	 * Restore the original images.
	 *
	 * @since  6.0.0
	 *
	 * @return The result of restore.
	 */
	public function restore_originals() {
		$basedir = Helper_Service::get_uploads_dir();

		exec( "find $basedir -regextype posix-extended -type f -regex '.*bak.(png|jpg|jpeg|gif)$' -exec rename '.bak' '' {} \;", $output, $result );

		$this->reset_image_optimization_status();

		return $result;
	}



	/**
	 * Delete the backup image on image delete.
	 *
	 * @since  6.0.0
	 *
	 * @param  int $id The attachment ID.
	 */
	public function delete_backups( $id ) {
		global $wp_filesystem;
		$main_image = get_attached_file( $id );
		$metadata   = wp_get_attachment_metadata( $id );
		$basename   = basename( $main_image );

		$wp_filesystem->delete( preg_replace( '~.(png|jpg|jpeg|gif)$~', '.bak.$1', $main_image ) );

		if ( ! empty( $metadata['sizes'] ) ) {
			// Loop through all image sizes and optimize them as well.
			foreach ( $metadata['sizes'] as $size ) {
				$wp_filesystem->delete( preg_replace( '~.(png|jpg|jpeg|gif)$~', '.bak.$1', str_replace( $basename, $size['file'], $main_image ) ) );
			}
		}
	}

	/**
	 * Add custom metabox for compression level per attachment, on the media screen.
	 *
	 * @since 6.0.6
	 *
	 * @param array   $form_fields Fields of the edit_attachment form.
	 * @param WP_Post $post        The object containing the attachment.
	 *
	 * @return array               Fields of the edit_attachment form.
	 */
	public function custom_attachment_compression_level_field( $form_fields, $post ) {
		// Get current attachment compression level.
		$field_value = get_post_meta( $post->ID, 'siteground_optimizer_compression_level', true );

		// If field value is empty - fallback to site global option.
		if ( ! is_numeric( $field_value ) ) {
			$field_value = get_option( 'siteground_optimizer_compression_level' );
		}

		// The field html.
		$html = '<select name="compression_level">';

		// Select options.
		$options = array(
			'None',
			'Low',
			'Medium',
			'High',
		);

		// Add the select options to the html.
		foreach ( $options as $key => $value ) {
			$html .= '<option' . selected( $field_value, $key, false ) . ' value="' . $key . '">' . $value . '</option>';
		}

		$html .= '</select>';

		$form_fields['compression_level'] = array(
			'value' => $field_value ? intval( $field_value ) : '',
			'label' => __( 'Compression Level', 'sg-cachepress' ),
			'input' => 'html',
			'html'  => $html,
		);

		return $form_fields;
	}

	/**
	 * Saving the new meta for the compression level of the attachment.
	 *
	 * @since 6.0.6
	 *
	 * @param int $attachment_id ID of the attachment.
	 *
	 * @return bool|string       Status code of the compression.
	 */
	public function custom_attachment_compression_level( $attachment_id ) {
		if ( ! isset( $_REQUEST['compression_level'] ) ) {
			return $attachment_id;
		}

		// Update the attachment's meta.
		update_post_meta( $attachment_id, 'siteground_optimizer_compression_level', $_REQUEST['compression_level'] ); // phpcs:ignore

		// Get attachment's filepath.
		$filepath = get_attached_file( $attachment_id );

		// Revert to backup image, if None is selected.
		if ( 1 === intval( $_REQUEST['compression_level'] ) ) {
			// Optimize the image with the new compression level.
			return $this->execute_optimization_command( $filepath, intval( $_REQUEST['compression_level'] ) );
		}

		// Find backup image path.
		$backup_filepath = preg_replace( '~.(png|jpg|jpeg|gif)$~', '.bak.$1', $filepath );

		// Check if backup file exists, if so, replace the file with the original one.
		if ( file_exists( $backup_filepath ) ) {
			copy( $backup_filepath, $filepath );
		}
	}
}
