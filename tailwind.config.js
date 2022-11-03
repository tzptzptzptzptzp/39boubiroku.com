/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './dist/*.{html,js}',
    './dist/assets/*.{html,js}',
  ],
  theme: {
    screens: {
      's': {'max': '599px'},
      'm': {'min': '600px', 'max': '959px'},
      'l': {'min': '960px'},
      'sm': {'max': '959px'},
      'ml': {'min': '600px'},
    },
    gap: {
      '1': '1%',
      '2': '2%',
      '3': '3%',
      '4': '4%',
      '5': '5%',
      '6': '6%',
      '7': '7%',
      '8': '8%',
      '9': '9%',
      '10': '10%',
    },
    extend: {
      fontFamily: {
        'logo': ['missLankfort', 'Times New Roman', 'YuMincho', 'Hiragino Mincho ProN', 'Yu Mincho', 'MS PMincho', 'serif'],
        'menu': ['mrSopkin', 'Times New Roman', 'YuMincho', 'Hiragino Mincho ProN', 'Yu Mincho', 'MS PMincho', 'serif'],
        'link': ['kleeOne', 'Times New Roman', 'YuMincho', 'Hiragino Mincho ProN', 'Yu Mincho', 'MS PMincho', 'serif'],
        'post': ['ShipporiMincho', 'Times New Roman', 'YuMincho', 'Hiragino Mincho ProN', 'Yu Mincho', 'MS PMincho', 'serif'],
      },
      colors: {
        transparent: 'transparent',
        main: '#',
        sub: '#',
        font: '#555',
        userRed: '#',
        userBlue: '#',
        userGreen: '#',
        userYellow: '#',
        userBlack: '#555',
        userWhite: '#ddd',
      },
      borderRadius: {
        '20': '20px',
        '25': '25px',
      },
      zIndex: {
        '1': '1',
        '3': '3',
        '5': '5',
        '99': '99',
        '999': '999',
        '-1': '-1',
      },
      transitionDuration: {
        '800': '800ms',
        '1500': '1500ms',
        '2000': '2000ms',
        '3000': '3000ms',
        '5000': '5000ms',
      },
    },
  },
  plugins: [],
}
