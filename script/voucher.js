var i1000 = document.getElementById('i1000');
var r1000 = document.getElementById('r1000');
var i500 = document.getElementById('i500');
var r500 = document.getElementById('r500');
var i100 = document.getElementById('i100');
var r100 = document.getElementById('r100');
var i50 = document.getElementById('i50');
var r50 = document.getElementById('r50');
var i20 = document.getElementById('i20');
var r20 = document.getElementById('r20');
var i10 = document.getElementById('i10');
var r10 = document.getElementById('r10');
var i5 = document.getElementById('i5');
var r5 = document.getElementById('r5');
var i2 = document.getElementById('i2');
var r2 = document.getElementById('r2');
var i1 = document.getElementById('i1');
var r1 = document.getElementById('r1');
var total = document.getElementById('total_ammount');

i1000.addEventListener('input', (e) => {
    r1000.value = e.target.value * 1000;
    calc_total();
});
i500.addEventListener('input', (e) => {
    r500.value = e.target.value * 500;
    calc_total();
});
i100.addEventListener('input', (e) => {
    r100.value = e.target.value * 100;
    calc_total();
});
i50.addEventListener('input', (e) => {
    r50.value = e.target.value * 50;
    calc_total();
});
i20.addEventListener('input', (e) => {
    r20.value = e.target.value * 20;
    calc_total();
});
i10.addEventListener('input', (e) => {
    r10.value = e.target.value * 10;
    calc_total();
});
i5.addEventListener('input', (e) => {
    r5.value = e.target.value * 5;
    calc_total();
});
i2.addEventListener('input', (e) => {
    r2.value = e.target.value * 2;
    calc_total();
});
i1.addEventListener('input', (e) => {
    r1.value = e.target.value * 1;
    calc_total();
});


function calc_total(){
    total.value = parseInt(r1000.value) + parseInt(r500.value) + parseInt(r100.value) + parseInt(r50.value) + parseInt(r20.value) + parseInt(r10.value) + parseInt(r5.value) + parseInt(r2.value) + parseInt(r1.value);
}

