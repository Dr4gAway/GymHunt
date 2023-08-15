/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
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
      boxShadow:{
        '2xl': '0px 2px 22px 3px rgba(189,189,189,1)',
      }
    },
  },
  plugins: [],
}

