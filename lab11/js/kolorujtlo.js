<<<<<<< HEAD
var computed = false;
var decimal = 0;

function convert (entryform, from, to)
{
    convertfrom = from.selectedIndex;
    convertto = to.selectedIndex;
    entryform.display.value = (entryform.imput.value * from[convertfrom].value / to[convertto].value);
}

function addChar (input, character)
{
    if((character=='.' && decimal=="0" || character!='.'))
    {
        (input.value == "" || input.value == "0") ? input.value = character : input.value += character
        convert(input.form,input.form.measure1,input.form.measure2)
        computed = true;
        if(character =='.')
        {
            decimal = 1;
        }
    }
}

function openVothcom()
{
    window.open("","Display window","toolbar=no,directories=no,menubar=no");
}

function clear (form)
{
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
    computed = false; 
}

function changeBackground(hexNumber)
{
    document.body.style.background = hexNumber;
=======
var computed = false;
var decimal = 0;

function convert (entryform, from, to)
{
    convertfrom = from.selectedIndex;
    convertto = to.selectedIndex;
    entryform.display.value = (entryform.imput.value * from[convertfrom].value / to[convertto].value);
}

function addChar (input, character)
{
    if((character=='.' && decimal=="0" || character!='.'))
    {
        (input.value == "" || input.value == "0") ? input.value = character : input.value += character
        convert(input.form,input.form.measure1,input.form.measure2)
        computed = true;
        if(character =='.')
        {
            decimal = 1;
        }
    }
}

function openVothcom()
{
    window.open("","Display window","toolbar=no,directories=no,menubar=no");
}

function clear (form)
{
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
    computed = false; 
}

function changeBackground(hexNumber)
{
    document.body.style.background = hexNumber;
>>>>>>> e659c7fadc5ef46889fde2d303403c5d6ec24030
}