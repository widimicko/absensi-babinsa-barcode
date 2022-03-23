!function(e){e.fn.thooClock=function(o){this.each(function(){var r,n,t,a,i,s,l;function d(e){var o;if(e instanceof Date)o=e;else{var r=e.split(":");o=new Date;for(var n=0;n<3;n++)r[n]=Math.floor(r[n]),(r[n]!=r[n]||r[n]>59)&&(r[n]=0),0==n&&r[n]>23&&(r[n]=0);o.setHours(r[0],r[1],r[2])}return o}function m(e){return Math.PI/180*e}function u(e){return e>=12&&(e-=12),e}function f(e){n.beginPath(),n.moveTo(0,0),n.lineTo(0,-1*e),n.stroke()}function c(e,o,r){var a,i,s,l=t.size/2.4;n.save(),n.lineWidth=parseInt(t.size/30,10),n.lineCap="butt",n.strokeStyle=o,void 0!==(a=e)&&(i=u(a.getHours()),s=a.getMinutes()),e=parseInt(i,10)+s/60,n.rotate(m(30*e)),n.shadowColor="rgba(0,0,0,.5)",n.shadowBlur=parseInt(t.size/55,10),n.shadowOffsetX=parseInt(t.size/300,10),n.shadowOffsetY=parseInt(t.size/300,10),n.beginPath(),n.moveTo(0,0),n.lineTo(0,-1*(l-t.size/10)),n.stroke(),n.beginPath(),n.strokeStyle=r,n.moveTo(0,-1*(l-t.size/10)),n.lineTo(0,-1*l),n.stroke(),n.beginPath(),n.arc(0,0,parseInt(t.size/24,10),0,360,!1),n.fillStyle=o,n.fill(),n.restore()}function h(o){var r,a,i,p,C,g,T,z,v,w,I;r=new Date,t.timeCorrection&&("+"===t.timeCorrection.operator&&(r.setHours(r.getHours()+t.timeCorrection.hours),r.setMinutes(r.getMinutes()+t.timeCorrection.minutes)),"-"===t.timeCorrection.operator&&(r.setHours(r.getHours()-t.timeCorrection.hours),r.setMinutes(r.getMinutes()-t.timeCorrection.minutes))),i=r.getSeconds(),a=t.sweepingSeconds?r.getMilliseconds():0,p=(g=r.getMinutes())+i/60,T=u((C=r.getHours())+p/60),n.clearRect(-s,-s,t.size,t.size),function(e,o){var r,a,i,l,d,m,u,f,c,h,p,C,g,T,z,v;for(r=parseInt(s-t.size/50,10),a=s-t.size/400,n.beginPath(),n.arc(0,0,a,0,360,!1),n.fillStyle=o,n.fill(),i=1;i<=60;i+=1)l=Math.PI/30*i,d=Math.sin(l),m=Math.cos(l),i%5==0?(n.lineWidth=parseInt(t.size/50,10),u=d*(r-r/9),f=m*-(r-r/9),c=d*r,h=m*-r,p=d*(r-r/4.2),C=m*-(r-r/4.2),marker=i/5,n.textBaseline="middle",g=parseInt(t.size/13,10),n.font="100 "+g+"px "+t.numeralFont,n.beginPath(),n.fillStyle=e,t.showNumerals&&t.numerals.length>0&&t.numerals.map(function(e){marker==Object.keys(e)&&(T=n.measureText(e[marker]).width,n.fillText(e[marker],p-T/2,C))})):(n.lineWidth=parseInt(t.size/100,10),u=d*(r-r/20),f=m*-(r-r/20),c=d*r,h=m*-r),n.beginPath(),n.strokeStyle=e,n.lineCap="round",n.moveTo(u,f),n.lineTo(c,h),n.stroke();void 0!==t.brandText&&(n.font="100 "+parseInt(t.size/28,10)+"px "+t.brandFont,z=n.measureText(t.brandText).width,n.fillText(t.brandText,-z/2,t.size/6)),void 0!==t.brandText2&&(n.textBaseline="middle",n.font="100 "+parseInt(t.size/44,10)+"px "+t.brandFont,v=n.measureText(t.brandText2).width,n.fillText(t.brandText2,-v/2,t.size/5))}(t.dialColor,t.dialBackgroundColor),void 0!==t.alarmTime&&(t.alarmTime=d(t.alarmTime),c(t.alarmTime,t.alarmHandColor,t.alarmHandTipColor)),function(e,o){var r=t.size/3;n.save(),n.lineWidth=parseInt(t.size/25,10),n.lineCap="round",n.strokeStyle=o,n.rotate(m(30*e)),n.shadowColor="rgba(0,0,0,.5)",n.shadowBlur=parseInt(t.size/50,10),n.shadowOffsetX=parseInt(t.size/300,10),n.shadowOffsetY=parseInt(t.size/300,10),f(r),n.restore()}(T,t.hourHandColor),v=p,w=t.minuteHandColor,I=t.size/2.2,n.save(),n.lineWidth=parseInt(t.size/50,10),n.lineCap="round",n.strokeStyle=w,t.sweepingMinutes||v.isInteger||(v=parseInt(v)),n.rotate(m(6*v)),n.shadowColor="rgba(0,0,0,.5)",n.shadowBlur=parseInt(t.size/50,10),n.shadowOffsetX=parseInt(t.size/250,10),n.shadowOffsetY=parseInt(t.size/250,10),f(I),n.restore(),function(e,o,r){var a=s-t.size/40;n.save(),n.lineWidth=parseInt(t.size/150,10),n.lineCap="round",n.strokeStyle=r,n.rotate(m(.006*e+6*o)),n.shadowColor="rgba(0,0,0,.5)",n.shadowBlur=parseInt(t.size/80,10),n.shadowOffsetX=parseInt(t.size/200,10),n.shadowOffsetY=parseInt(t.size/200,10),f(a),n.beginPath(),n.moveTo(0,0),n.lineTo(0,a/15),n.lineWidth=parseInt(t.size/30,10),n.stroke(),n.beginPath(),n.arc(0,0,parseInt(t.size/30,10),0,360,!1),n.fillStyle=r,n.fill(),n.restore()}(a,i,t.secondHandColor),l!==i&&(e(t).trigger("onEverySecond"),l=i),void 0!==t.alarmTime&&(z=60*t.alarmTime.getHours()*60+60*t.alarmTime.getMinutes()+t.alarmTime.getSeconds()),60*C*60+60*g+i>=z&&(o+=1),o<=t.alarmCount&&0!==o&&e(t).trigger("onAlarm"),window.requestAnimationFrame(function(){h(o)})}a={size:250,dialColor:"#000000",dialBackgroundColor:"transparent",secondHandColor:"#F3A829",minuteHandColor:"#222222",hourHandColor:"#222222",alarmHandColor:"#FFFFFF",alarmHandTipColor:"#026729",timeCorrection:{operator:"+",hours:0,minutes:0},alarmCount:1,showNumerals:!0,numerals:[{1:1},{2:2},{3:3},{4:4},{5:5},{6:6},{7:7},{8:8},{9:9},{10:10},{11:11},{12:12}],sweepingMinutes:!0,sweepingSeconds:!1,numeralFont:"arial",brandFont:"arial"},i=e.extend({},a,o),(t=this).size=i.size,t.dialColor=i.dialColor,t.dialBackgroundColor=i.dialBackgroundColor,t.secondHandColor=i.secondHandColor,t.minuteHandColor=i.minuteHandColor,t.hourHandColor=i.hourHandColor,t.alarmHandColor=i.alarmHandColor,t.alarmHandTipColor=i.alarmHandTipColor,t.timeCorrection=i.timeCorrection,t.showNumerals=i.showNumerals,t.numerals=i.numerals,t.numeralFont=i.numeralFont,t.brandText=i.brandText,t.brandText2=i.brandText2,t.brandFont=i.brandFont,t.alarmCount=i.alarmCount,t.alarmTime=i.alarmTime,t.onAlarm=i.onAlarm,t.offAlarm=i.offAlarm,t.onEverySecond=i.onEverySecond,t.sweepingMinutes=i.sweepingMinutes,t.sweepingSeconds=i.sweepingSeconds,r=document.createElement("canvas"),n=r.getContext("2d"),r.width=this.size,r.height=this.size,e(r).appendTo(t),s=parseInt(t.size/2,10),n.translate(s,s),e.fn.thooClock.setAlarm=function(e){t.alarmTime=d(e)},e.fn.thooClock.clearAlarm=function(){t.alarmTime=void 0,h(0),e(t).trigger("offAlarm")},void 0!==t.onAlarm&&e(t).on("onAlarm",function(e){t.onAlarm(),e.preventDefault(),e.stopPropagation()}),void 0!==t.onEverySecond&&e(t).on("onEverySecond",function(e){t.onEverySecond(),e.preventDefault()}),void 0!==t.offAlarm&&e(t).on("offAlarm",function(e){t.offAlarm(),e.stopPropagation(),e.preventDefault()}),l=0,h(0)})}}(jQuery);