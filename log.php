<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
<style>
    /*   color variables */
$clr-primary: #18ffff;
$clr-primary-light: #adffff;
$clr-primary-dark: #091034;
$clr-gray100: #f9fbff;
$clr-gray150: #f4f6fb;
$clr-gray200: #eef1f6;
$clr-gray300: #e1e5ee;
$clr-gray400: #767b91;
$clr-gray500: #4f546c;
$clr-gray600: #2a324b;
$clr-gray700: #161d34;
$clr-bg: #060b23;

/*   border radius */
$radius: 0.5rem;

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: "Convergence", sans-serif;
  height: 100vh;
  display: grid;
  justify-content: center;
  align-items: center;
  font-size: 1.2rem;
  background-color: $clr-bg;
}

.form {
  position: relative;
  width: 20rem;
  height: 3rem;

  &__input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 2px solid $clr-gray300;
    border-radius: $radius;
    font-family: inherit;
    font-size: inherit;
    color: white;
    outline: none;
    padding: 1.25rem;
    background: none;

    &:hover {
      border-color: $clr-primary-light;
    }

    /* Change border when input focus*/

    &:focus {
      border-color: $clr-primary;
    }
  }

  &__label {
    position: absolute;
    left: 1rem;
    top: 0.8rem;
    padding: 0 0.5rem;
    color: white;
    cursor: text;
    transition: top 200ms ease-in, left 200ms ease-in, font-size 200ms ease-in;
    background-color: $clr-bg;
  }
}

/* 
1. When the input is in the focus state
reduce the size of the label and move upwards 

2. Keep label state when content is in input field 
*/

.form__input:focus ~ .form__label,
.form__input:not(:placeholder-shown).form__input:not(:focus) ~ .form__label {
  top: -0.5rem;
  font-size: 0.8rem;
  left: 0.8rem;
}

</style>

</head>

<body>
  <div class="form">
    <input type="text" id="email" class="form__input" autocomplete="off" placeholder=" ">
    <label for="email" class="form__label">Email</label>
  </div>
</body>