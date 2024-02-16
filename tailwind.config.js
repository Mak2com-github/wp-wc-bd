/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './**/*.php',
    './assets/js/*.js'
  ],
  theme: {
    extend: {
      colors: {
        'classic-white': '#FFFFFF',
        'light-grey': '#F6F6F6',
        'medium-grey': '#D9D9D9',
        'deep-grey': '#797979',
        'light-green': '#6FBA81',
        'deep-green': '#164544',
        'light-dark': "#333333",
      },
      fontFamily: {
        'sans': ['"new-hero"', ...defaultTheme.fontFamily.sans],
        'title': ['"commuters-sans"', ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        xxs: '0.65rem', // 10.8px
        xs: '0.85rem', // 13.6px
        sm: '1rem', // 16px
        base: '1.2rem', // 18px
        l: '1.25rem', // 20px
        xl: '1.45rem', // 24px
        xl2: '1.72rem', // 28px
        xl3: '2rem', // 32px
        xl4: '2.5rem', // 40px
        xl5: '3rem', // 48px
        xl6: '4rem', // 64px
        xl7: '5rem', // 80px
      },
      height: {
        '10vh': '10vh',
        '10vw': '10vw',
        '20vh': '20vh',
        '20vw': '20vw',
        '30vh': '30vh',
        '30vw': '30vw',
        '40vh': '40vh',
        '40vw': '40vw',
        '50vh': '50vh',
        '50vw': '50vw',
        '60vh': '60vh',
        '60vw': '60vw',
        '70vh': '70vh',
        '70vw': '70vw',
        '80vh': '80vh',
        '80vw': '80vw',
        '90vh': '90vh',
        '90vw': '90vw',
        '100vh': '100vh',
      },
      backgroundColor: {
        'black-opacity-20': 'rgba(0,0,0,0.2)',
        'black-opacity': 'rgba(0,0,0,0.4)',
        'light-green-opacity': 'rgba(111, 186, 129, 0.2)',
      },
      backgroundImage: {
        'black-gradient': 'linear-gradient(180deg, rgba(0, 0, 0, 0.00) 0%, #000 100%);',
        'black-gradient-soft': 'linear-gradient(180deg, rgba(0, 0, 0, 0.00) 0%, rgba(0, 0, 0, 0.70) 100%);',
        'green-gradient': 'linear-gradient(90deg, #164544 0%, #6FBA81 100%)',
        'dashed-line': "linear-gradient(to right, #000 50%, transparent 0%)",
      },
      backgroundSize: {
        '100%': '100%',
        '25x2': '25px 2px',
      },
      keyframes: {
      },
      animation: {
      },
      gridTemplateRows: {
        'auto': 'auto',
      },
      backgroundPosition: {
        'center-top': 'center top',
        '20_center': '20% center',
        '25_center': '25% center',
        'center_-12rem': 'center -12rem',
        'bottom': 'bottom',
      },
      boxShadow: {
        'shadow-light': '0 4px 4px 0 rgba(0, 0, 0, 0.20)',
        'shadow-medium': '0 2px 5px 0 rgba(0, 0, 0, 0.3)',
      },
    },
  },
  plugins: [],
}