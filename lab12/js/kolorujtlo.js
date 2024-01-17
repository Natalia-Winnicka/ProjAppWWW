var computed = false;
var decimal =0;

function convert (entryfrom, from, to)
{
    convertfrom = from.selectedIndex;
    convertto = to.selectedIndex;
    entryfrom.display.value = (entryfrom.input.value = from[convertfrom].value / to[convertto].value);
}

function addchar (input, character)
{
    if((character=='.' && decimal=="0") || character!='.')
    {
        convert(input.from,input.from.measure1, input.from.measure2)
        computed = true;
        if (character=='.')
        {
          decimal = 1;
        }
    }
}
function openVothcom()
{
    window.open("", "Display window","toolbar=no, directories=no, menubar=no");
}

function clear (from)
{
    from.input.value = 0;
    from.display.value = 0;
    decimal=0;
}
const button = document.querySelector('#changeColorButton');

button.addEventListener('click', () =>{
    let mycolor = randomColor();
    document.body.style.backgroundColor = mycolor;
})

const randomColor = () =>{
    let r = getRandomInt(255);
    let g = getRandomInt(255);
    let b = getRandomInt(255);
    let mycolor = `rgb(${r},${g},${b})`
    return mycolor;
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }