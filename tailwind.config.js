/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        lato: ["Lato", "sans-serif"],
      },
      colors: {
        customBlue: "#4596BA",
        customBlueLight: "#6BB8D6",
      },
      width: {
        128: "32.5rem",
      },
    },
  },
  plugins: [require("@tailwindcss/line-clamp")],
};