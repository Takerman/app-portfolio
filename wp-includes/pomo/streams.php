<?php
/**
 * Classes, which help reading streams of data from files.
 * Based on the classes from Danilo Segan <danilo@kvota.net>
 *
 * @version $Id: streams.php 1157 2015-11-20 04:30:11Z dd32 $
 * @package pomo
 * @subpackage streams
 */

if ( ! class_exists( 'POMO_Reader', false ) ) :
	class POMO_Reader {

		public $endian = 'little';
		public $_post  = '';

		/**
		 * PHP5 constructor.
		 */
<<<<<<< HEAD
		public function __construct() {
=======
		function __construct() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( function_exists( 'mb_substr' )
				&& ( (int) ini_get( 'mbstring.func_overload' ) & 2 ) // phpcs:ignore PHPCompatibility.IniDirectives.RemovedIniDirectives.mbstring_func_overloadDeprecated
			) {
				$this->is_overloaded = true;
			} else {
				$this->is_overloaded = false;
			}

			$this->_pos = 0;
		}

		/**
		 * PHP4 constructor.
		 *
		 * @deprecated 5.4.0 Use __construct() instead.
		 *
		 * @see POMO_Reader::__construct()
		 */
		public function POMO_Reader() {
			_deprecated_constructor( self::class, '5.4.0', static::class );
			self::__construct();
		}

		/**
		 * Sets the endianness of the file.
		 *
		 * @param string $endian Set the endianness of the file. Accepts 'big', or 'little'.
		 */
<<<<<<< HEAD
		public function setEndian( $endian ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
=======
		function setEndian( $endian ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$this->endian = $endian;
		}

		/**
		 * Reads a 32bit Integer from the Stream
		 *
		 * @return mixed The integer, corresponding to the next 32 bits from
		 *  the stream of false if there are not enough bytes or on error
		 */
<<<<<<< HEAD
		public function readint32() {
=======
		function readint32() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$bytes = $this->read( 4 );
			if ( 4 != $this->strlen( $bytes ) ) {
				return false;
			}
			$endian_letter = ( 'big' === $this->endian ) ? 'N' : 'V';
			$int           = unpack( $endian_letter, $bytes );
			return reset( $int );
		}

		/**
		 * Reads an array of 32-bit Integers from the Stream
		 *
		 * @param int $count How many elements should be read
		 * @return mixed Array of integers or false if there isn't
		 *  enough data or on error
		 */
<<<<<<< HEAD
		public function readint32array( $count ) {
=======
		function readint32array( $count ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$bytes = $this->read( 4 * $count );
			if ( 4 * $count != $this->strlen( $bytes ) ) {
				return false;
			}
			$endian_letter = ( 'big' === $this->endian ) ? 'N' : 'V';
			return unpack( $endian_letter . $count, $bytes );
		}

		/**
		 * @param string $string
		 * @param int    $start
		 * @param int    $length
		 * @return string
		 */
<<<<<<< HEAD
		public function substr( $string, $start, $length ) {
=======
		function substr( $string, $start, $length ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( $this->is_overloaded ) {
				return mb_substr( $string, $start, $length, 'ascii' );
			} else {
				return substr( $string, $start, $length );
			}
		}

		/**
		 * @param string $string
		 * @return int
		 */
<<<<<<< HEAD
		public function strlen( $string ) {
=======
		function strlen( $string ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( $this->is_overloaded ) {
				return mb_strlen( $string, 'ascii' );
			} else {
				return strlen( $string );
			}
		}

		/**
		 * @param string $string
		 * @param int    $chunk_size
		 * @return array
		 */
<<<<<<< HEAD
		public function str_split( $string, $chunk_size ) {
=======
		function str_split( $string, $chunk_size ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( ! function_exists( 'str_split' ) ) {
				$length = $this->strlen( $string );
				$out    = array();
				for ( $i = 0; $i < $length; $i += $chunk_size ) {
					$out[] = $this->substr( $string, $i, $chunk_size );
				}
				return $out;
			} else {
				return str_split( $string, $chunk_size );
			}
		}

		/**
		 * @return int
		 */
<<<<<<< HEAD
		public function pos() {
=======
		function pos() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return $this->_pos;
		}

		/**
		 * @return true
		 */
<<<<<<< HEAD
		public function is_resource() {
=======
		function is_resource() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return true;
		}

		/**
		 * @return true
		 */
<<<<<<< HEAD
		public function close() {
=======
		function close() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return true;
		}
	}
endif;

if ( ! class_exists( 'POMO_FileReader', false ) ) :
	class POMO_FileReader extends POMO_Reader {

		/**
		 * @param string $filename
		 */
<<<<<<< HEAD
		public function __construct( $filename ) {
=======
		function __construct( $filename ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			parent::__construct();
			$this->_f = fopen( $filename, 'rb' );
		}

		/**
		 * PHP4 constructor.
		 *
		 * @deprecated 5.4.0 Use __construct() instead.
		 *
		 * @see POMO_FileReader::__construct()
		 */
		public function POMO_FileReader( $filename ) {
			_deprecated_constructor( self::class, '5.4.0', static::class );
			self::__construct( $filename );
		}

		/**
		 * @param int $bytes
		 * @return string|false Returns read string, otherwise false.
		 */
<<<<<<< HEAD
		public function read( $bytes ) {
=======
		function read( $bytes ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return fread( $this->_f, $bytes );
		}

		/**
		 * @param int $pos
		 * @return bool
		 */
<<<<<<< HEAD
		public function seekto( $pos ) {
=======
		function seekto( $pos ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			if ( -1 == fseek( $this->_f, $pos, SEEK_SET ) ) {
				return false;
			}
			$this->_pos = $pos;
			return true;
		}

		/**
		 * @return bool
		 */
<<<<<<< HEAD
		public function is_resource() {
=======
		function is_resource() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return is_resource( $this->_f );
		}

		/**
		 * @return bool
		 */
<<<<<<< HEAD
		public function feof() {
=======
		function feof() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return feof( $this->_f );
		}

		/**
		 * @return bool
		 */
<<<<<<< HEAD
		public function close() {
=======
		function close() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return fclose( $this->_f );
		}

		/**
		 * @return string
		 */
<<<<<<< HEAD
		public function read_all() {
=======
		function read_all() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$all = '';
			while ( ! $this->feof() ) {
				$all .= $this->read( 4096 );
			}
			return $all;
		}
	}
endif;

if ( ! class_exists( 'POMO_StringReader', false ) ) :
	/**
	 * Provides file-like methods for manipulating a string instead
	 * of a physical file.
	 */
	class POMO_StringReader extends POMO_Reader {

		public $_str = '';

		/**
		 * PHP5 constructor.
		 */
<<<<<<< HEAD
		public function __construct( $str = '' ) {
=======
		function __construct( $str = '' ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			parent::__construct();
			$this->_str = $str;
			$this->_pos = 0;
		}

		/**
		 * PHP4 constructor.
		 *
		 * @deprecated 5.4.0 Use __construct() instead.
		 *
		 * @see POMO_StringReader::__construct()
		 */
		public function POMO_StringReader( $str = '' ) {
			_deprecated_constructor( self::class, '5.4.0', static::class );
			self::__construct( $str );
		}

		/**
		 * @param string $bytes
		 * @return string
		 */
<<<<<<< HEAD
		public function read( $bytes ) {
=======
		function read( $bytes ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$data        = $this->substr( $this->_str, $this->_pos, $bytes );
			$this->_pos += $bytes;
			if ( $this->strlen( $this->_str ) < $this->_pos ) {
				$this->_pos = $this->strlen( $this->_str );
			}
			return $data;
		}

		/**
		 * @param int $pos
		 * @return int
		 */
<<<<<<< HEAD
		public function seekto( $pos ) {
=======
		function seekto( $pos ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			$this->_pos = $pos;
			if ( $this->strlen( $this->_str ) < $this->_pos ) {
				$this->_pos = $this->strlen( $this->_str );
			}
			return $this->_pos;
		}

		/**
		 * @return int
		 */
<<<<<<< HEAD
		public function length() {
=======
		function length() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return $this->strlen( $this->_str );
		}

		/**
		 * @return string
		 */
<<<<<<< HEAD
		public function read_all() {
=======
		function read_all() {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			return $this->substr( $this->_str, $this->_pos, $this->strlen( $this->_str ) );
		}

	}
endif;

if ( ! class_exists( 'POMO_CachedFileReader', false ) ) :
	/**
	 * Reads the contents of the file in the beginning.
	 */
	class POMO_CachedFileReader extends POMO_StringReader {
		/**
		 * PHP5 constructor.
		 */
<<<<<<< HEAD
		public function __construct( $filename ) {
=======
		function __construct( $filename ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			parent::__construct();
			$this->_str = file_get_contents( $filename );
			if ( false === $this->_str ) {
				return false;
			}
			$this->_pos = 0;
		}

		/**
		 * PHP4 constructor.
		 *
		 * @deprecated 5.4.0 Use __construct() instead.
		 *
		 * @see POMO_CachedFileReader::__construct()
		 */
		public function POMO_CachedFileReader( $filename ) {
			_deprecated_constructor( self::class, '5.4.0', static::class );
			self::__construct( $filename );
		}
	}
endif;

if ( ! class_exists( 'POMO_CachedIntFileReader', false ) ) :
	/**
	 * Reads the contents of the file in the beginning.
	 */
	class POMO_CachedIntFileReader extends POMO_CachedFileReader {
		/**
		 * PHP5 constructor.
		 */
		public function __construct( $filename ) {
			parent::__construct( $filename );
		}

		/**
		 * PHP4 constructor.
		 *
		 * @deprecated 5.4.0 Use __construct() instead.
		 *
		 * @see POMO_CachedIntFileReader::__construct()
		 */
<<<<<<< HEAD
		public function POMO_CachedIntFileReader( $filename ) {
=======
		function POMO_CachedIntFileReader( $filename ) {
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
			_deprecated_constructor( self::class, '5.4.0', static::class );
			self::__construct( $filename );
		}
	}
endif;

