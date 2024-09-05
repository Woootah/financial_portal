/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./public/**/*.{html,php,js}"],
    theme: {
      extend: {
        colors: {
            primary: "#FFFDF7",
            secondary: "#00329F",
        },
        fontFamily: {
            font1: "Outfit",
            font2: "Poppins"
        }
      },
    },
    plugins: [],
  }
