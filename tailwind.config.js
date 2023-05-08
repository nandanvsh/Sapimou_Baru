/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/**/*.blade.php"],
  theme: {
    extend: {
        colors: {
            'primary': '#4F7F89',
            'btn-red': '#F59999',
            'btn-blue': '#3C486B'
        },
        backgroundImage: {
            'bg1': 'url("/images/bg1.png")',
            'bg2': 'url("/images/bg2.png")',
            'bg3': 'url("/images/bg3.png")',
        }
    },
  },
  plugins: [],
}

