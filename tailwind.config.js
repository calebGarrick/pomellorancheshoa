import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
      },
      borderRadius: {
        selector: '1rem',  // from --radius-selector
        field: '0.5rem',   // from --radius-field
        box: '1rem',       // from --radius-box
      },
      borderWidth: {
        DEFAULT: '1px',    // from --border
      },
    },
  },
  plugins: [daisyui],
  daisyui: {
    themes: [
      {
        autumn: {
          "primary": "#d16243",
          "primary-content": "#e9e0d9",
          "secondary": "#e0a871",
          "secondary-content": "#f9f7f4",
          "accent": "#e6b38f",
          "accent-content": "#262019",
          "neutral": "#8c7b6c",
          "neutral-content": "#fefdfd",
          "base-100": "#f5f5f5",
          "base-200": "#e3e3e3",
          "base-300": "#d1d1d1",
          "base-content": "#31302f",
          "info": "#ebf4ff",
          "info-content": "#20204d",
          "success": "#a0d6b8",
          "success-content": "#fefdfd",
          "warning": "#fff1a8",
          "warning-content": "#25210d",
          "error": "#d96a58",
          "error-content": "#fef9f5",
        },
      },
    ],
  },
};
