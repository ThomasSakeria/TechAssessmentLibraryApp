import{j as r,k as u,v as d,e as i,o as p}from"./app-j9RUPvNx.js";const k=["value"],h={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{type:String,default:null}},emits:["update:checked"],setup(e,{emit:c}){const s=c,n=e,t=r({get(){return n.checked},set(o){s("update:checked",o)}});return(o,a)=>u((p(),i("input",{"onUpdate:modelValue":a[0]||(a[0]=l=>t.value=l),type:"checkbox",value:e.value,class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,k)),[[d,t.value]])}};export{h as _};
