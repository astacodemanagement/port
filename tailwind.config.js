/** @type {import('tailwindcss').Config} */
module.exports = {
  // prefx tw
  prefix: 'tw-',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
  'clash-display': ['Clash Display', 'sans-serif'],
  'caveat': ['Caveat', 'sans-serif'],
  'work-sans': ['Work Sans', 'sans-serif'],
},
      colors: {
        clifford: '#da373d',
      }
    }
  },
  plugins: [],
}

