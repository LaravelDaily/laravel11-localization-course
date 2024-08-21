import{G as p,Y as w}from"./dialog-6de4cc28.js";import{d as y,C as h,y as v,s as x,o as g,c as _,w as n,b as c,u as o,f,E as C,k as b,a5 as E,r as d,a6 as S}from"./app-8d2ddf0a.js";import{r as m,S as k}from"./transition-fb8d0e84.js";const B=f("div",{class:"fixed inset-0 bg-gray-500/25 backdrop-blur transition-opacity"},null,-1),D={class:"fixed inset-0 overflow-y-auto"},T={class:"flex min-h-full items-center justify-center p-4 text-center"},G=y({__name:"confirmation-dialog",props:{size:{default:"lg"},closeable:{type:Boolean,default:!0},show:{type:Boolean,default:!1}},emits:["close"],setup(u,{emit:t}){const a=u,r=t;h(()=>a.show,e=>{e&&r("close")});const l=()=>{a.closeable&&r("close")};v(()=>document.addEventListener("keydown",e=>e.key==="Escape"&&l()));const i=x(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[a.size]);return(e,s)=>(g(),_(o(k),{appear:"",as:"template",show:e.show},{default:n(()=>[c(o(w),{as:"div",class:"relative z-50",onClose:l},{default:n(()=>[c(o(m),{as:"template","leave-to":"opacity-0",enter:"duration-300 ease-out","enter-from":"opacity-0","enter-to":"opacity-100",leave:"duration-200 ease-in","leave-from":"opacity-100",onAfterLeave:l},{default:n(()=>[B]),_:1}),f("div",D,[f("div",T,[c(o(m),{as:"template",enter:"duration-300 ease-out","enter-from":"opacity-0 scale-95","enter-to":"opacity-100 scale-100",leave:"duration-200 ease-in","leave-from":"opacity-100 scale-100","leave-to":"opacity-0 scale-95"},{default:n(()=>[c(o(p),{class:C([[o(i)],"w-full rounded-2xl bg-white text-left align-middle shadow-xl transition-all"])},{default:n(()=>[b(e.$slots,"default")]),_:3},8,["class"])]),_:3})])])]),_:3})]),_:3},8,["show"]))}});function I(){const u=E(),t=d(!1),a=d(!1),r=()=>{a.value=!0};async function l(e,s){t.value=!0;try{e(),t.value=!1,i(),s&&s.onSuccess&&s.onSuccess()}catch{u.error("Something went wrong, please try again.",{icon:!0,position:S.BOTTOM_CENTER}),t.value=!1,s&&s.onError&&s.onError()}}const i=()=>{a.value=!1};return{loading:t,showDialog:a,openDialog:r,performAction:l,closeDialog:i}}export{G as _,I as u};
