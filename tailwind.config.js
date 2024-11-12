/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./public/**/*.{html,php,js}"],
    theme: {
      extend: {
        colors: {
            primary: "#FFFFFF",
            secondary: "#00329F",
            tertiary: "#e7e6e7"
        },
        fontFamily: {
            font1: "Outfit",
            font2: "Space Grotesk"
        }
      },
    },
    plugins: [],
  }
