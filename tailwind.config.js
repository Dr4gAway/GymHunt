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
          'purple-2': '#8787DE',
          'gray-1': '#DFE6F9',
        }
      },
      fontFamily: {
        poppins: ['Poppins'],
      },
      minWidth: {
        '1/2': '50%',
        '3/5': '60%'
      },
      maxHeight: {
        '4/5': '80%',
      },
      boxShadow:{
        '2xl': '0px 2px 22px 3px rgba(189,189,189,1)',
      },
      lineClamp:{
        '10':'10',
      },
      width:{
        '550':'550px',
        '940':'940px'
      }
    },
  },
  plugins: [],
}

