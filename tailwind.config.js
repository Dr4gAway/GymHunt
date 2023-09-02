/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'gymhunt': {
          'purple-1': '#5348D9',
          'purple-2': '#8787DE'
        }
      },
      fontFamily: {
        poppins: ['Poppins'],
      },
      minWidth: {
        '1/2': '50%',
        '3/5': '60%'
      }
    },
  },
  plugins: [require("tw-elements/dist/plugin.cjs")],
}

