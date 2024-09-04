/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./public/**/*.{html,php,js}"],
    theme: {
      extend: {
        colors: {
            primary: "#f3f8f9",
            secondary: "#1134ca",
        },
        fontFamily: {
            font1: "Outfit",
            font2: "Poppins"
        }
      },
    },
    plugins: [],
  }
