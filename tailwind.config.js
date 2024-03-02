/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,php}", "node_modules/preline/dist/*.js"],
  theme: {
    extend: {},
  },
  plugins: [require("preline/plugin")],
}

