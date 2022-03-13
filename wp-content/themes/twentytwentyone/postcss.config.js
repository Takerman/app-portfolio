module.exports = {
	plugins: [
		require('postcss-nested'),
		require('postcss-css-variables')({
			preserve: false,
			preserveAtRulesOrder: true
		}),
		require('postcss-calc')({
			precision: 0
		}),
<<<<<<< HEAD
		require('postcss-discard-duplicates'),
		require('postcss-merge-rules')
=======
		require('postcss-discard-duplicates')
>>>>>>> e18f5ac9ad7aab8535f127152ee52f505e0cbc73
	]
};
