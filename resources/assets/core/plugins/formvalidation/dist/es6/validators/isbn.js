export default function e(){return{validate(e){if(e.value===""){return{meta:{type:null},valid:true}}let t;switch(true){case/^\d{9}[\dX]$/.test(e.value):case e.value.length===13&&/^(\d+)-(\d+)-(\d+)-([\dX])$/.test(e.value):case e.value.length===13&&/^(\d+)\s(\d+)\s(\d+)\s([\dX])$/.test(e.value):t="ISBN10";break;case/^(978|979)\d{9}[\dX]$/.test(e.value):case e.value.length===17&&/^(978|979)-(\d+)-(\d+)-(\d+)-([\dX])$/.test(e.value):case e.value.length===17&&/^(978|979)\s(\d+)\s(\d+)\s(\d+)\s([\dX])$/.test(e.value):t="ISBN13";break;default:return{meta:{type:null},valid:false}}const a=e.value.replace(/[^0-9X]/gi,"").split("");const l=a.length;let s=0;let d;let u;switch(t){case"ISBN10":s=0;for(d=0;d<l-1;d++){s+=parseInt(a[d],10)*(10-d)}u=11-s%11;if(u===11){u=0}else if(u===10){u="X"}return{meta:{type:t},valid:`${u}`===a[l-1]};case"ISBN13":s=0;for(d=0;d<l-1;d++){s+=d%2===0?parseInt(a[d],10):parseInt(a[d],10)*3}u=10-s%10;if(u===10){u="0"}return{meta:{type:t},valid:`${u}`===a[l-1]}}}}}