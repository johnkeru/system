export default function t(t){let e=t;if(/^PL[0-9]{10}$/.test(e)){e=e.substr(2)}if(!/^[0-9]{10}$/.test(e)){return{meta:{},valid:false}}const r=[6,5,7,2,3,4,5,6,7,-1];let a=0;for(let t=0;t<10;t++){a+=parseInt(e.charAt(t),10)*r[t]}return{meta:{},valid:a%11===0}}