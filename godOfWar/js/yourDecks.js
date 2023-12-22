console.log("working")
const element = document.getElementById("dropdown")
const elementTwo =  document.getElementById("dropdown2")
const elementThree =   document.getElementById("dropdown3")
const input = document.getElementById("updateInput")
const button = document.getElementById("buttonSaveFinal")

const show = ()=>{
    console.log("function call")
    console.log(elementTwo)
    console.log(input)

    element.classList.add('show');
    elementTwo.classList.add('show');
    elementThree.classList.add('show');

    input.classList.add('show')
    button.classList.add('show')

}

const hide = ()=>{
    element.classList.remove('show');
    elementTwo.classList.remove('show');
    elementThree.classList.remove('show');
    input.classList.remove('show')
    button.classList.remove('show')
}