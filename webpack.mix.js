let webpack = require('webpack')
let mix = require('laravel-mix')

mix.js('resources/js/field.js', 'dist/js')
   	.sass('resources/sass/field.scss', 'dist/css')
   	.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'dist/img')
    .webpackConfig({
        resolve: {
            symlinks: false
        },
        plugins: [
			    // Jquery loader plugin.
			    new webpack.ProvidePlugin({
			      $: "jquery",
			      jQuery: "jquery"
			    })
			  ]
    })
