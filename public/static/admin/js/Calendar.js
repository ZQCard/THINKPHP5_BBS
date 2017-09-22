var gMonths=new Array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");  
var WeekDay=new Array("日","一","二","三","四","五","六");  
var strToday="今天";  
var strYear="年";  
var strMonth="月";  
var strDay="日";  
var splitChar="-";  
var startYear=1900;  
var endYear=2050;  
var dayTdHeight=20;  
var dayTdTextSize=12;  
var gcNotCurMonth="#E0E0E0";  
var gcRestDay="#FF0000";  
var gcWorkDay="#444444";  
var gcMouseOver="#79D0FF";  
var gcMouseOut="#F4F4F4";  
var gcToday="#444444";  
var gcTodayMouseOver="#6699FF";  
var gcTodayMouseOut="#79D0FF";  
var gdCtrl=new Object();  
var goSelectTag=new Array();  
var gdCurDate=new Date();  
var giYear=gdCurDate.getFullYear();  
var giMonth=gdCurDate.getMonth()+1;  
var giDay=gdCurDate.getDate();  
function $$(){var elements=new Array();for(var i=0;i<arguments.length;i++) {var element=arguments[i];if(typeof(arguments[i])=='string'){element=document.getElementById(arguments[i]);}if(arguments.length==1){return element;}elements.Push(element);}return elements;}  
Array.prototype.Push=function(){var startLength=this.length;for(var i=0;i<arguments.length;i++){this[startLength+i]=arguments[i];}return this.length;}  
String.prototype.HexToDec=function(){return parseInt(this,16);}  
String.prototype.cleanBlank=function(){return this.isEmpty()?"":this.replace(/\s/g,"");}  
function checkColor(){var color_tmp=(arguments[0]+"").replace(/\s/g,"").toUpperCase();var model_tmp1=arguments[1].toUpperCase();var model_tmp2="rgb("+arguments[1].substring(1,3).HexToDec()+","+arguments[1].substring(1,3).HexToDec()+","+arguments[1].substring(5).HexToDec()+")";model_tmp2=model_tmp2.toUpperCase();if(color_tmp==model_tmp1 ||color_tmp==model_tmp2){return true;}return false;}  
function $V(){return $$(arguments[0]).value;}  
function fPopCalendar(evt,popCtrl,dateCtrl){  
    evt.cancelBubble=true;  
    gdCtrl=dateCtrl;  
    if(gdCtrl.value == ''){  
        fSetYearMon(giYear,giMonth);  
    }else{  
        var aDates = gdCtrl.value.split('-')  
        fSetYearMon(aDates[0],aDates[1]);  
  
    }  
      
    var point=fGetXY(popCtrl);  
    with($$("calendardiv").style){  
        left=point.x+"px";  
        top=(point.y+popCtrl.offsetHeight+1)+"px";  
        visibility='visible';  
        //zindex='99999';  
        position='absolute';  
    }  
    $$("calendardiv").focus();  
}  
function fSetDate(iYear,iMonth,iDay){  
    var iMonthNew=new String(iMonth);  
    var iDayNew=new String(iDay);  
    if(iMonthNew.length<2){  
        iMonthNew="0"+iMonthNew;  
    }  
    if(iDayNew.length<2){  
        iDayNew="0"+iDayNew;  
    }  
    gdCtrl.value=iYear+splitChar+iMonthNew+splitChar+iDayNew;  
    fHideCalendar();  
}  
function fHideCalendar(){$$("calendardiv").style.visibility="hidden";for(var i=0;i<goSelectTag.length;i++){goSelectTag[i].style.visibility="visible";}goSelectTag.length=0;}  
function fSetSelected(){  
    var iOffset=0;  
    var iYear=parseInt($$("tbSelYear").value);  
    var iMonth=parseInt($$("tbSelMonth").value);  
    var aCell=$$("cellText"+arguments[0]);  
    aCell.bgColor=gcMouseOut;  
    with(aCell){  
        var iDay=parseInt(innerHTML);  
        if(checkColor(style.color,gcNotCurMonth)){  
            iOffset=(innerHTML>10)?-1:1;  
        }  
        iMonth+=iOffset;  
        if(iMonth<1){iYear--;iMonth=12;}  
        else if(iMonth>12){iYear++;iMonth=1;}  
    }  
    fSetDate(iYear,iMonth,iDay);  
}  
function Point(iX,iY){this.x=iX;this.y=iY;}  
function clearDate(){gdCtrl.value = '';fHideCalendar();}  
function fBuildCal(iYear,iMonth){var aMonth=new Array();for(var i=1;i<7;i++){aMonth[i]=new Array(i);}var dCalDate=new Date(iYear,iMonth-1,1);var iDayOfFirst=dCalDate.getDay();var iDaysInMonth=new Date(iYear,iMonth,0).getDate();var iOffsetLast=new Date(iYear,iMonth-1,0).getDate()-iDayOfFirst+1;var iDate=1;var iNext=1;for(var d=0;d<7;d++){aMonth[1][d]=(d<iDayOfFirst)?(iOffsetLast+d)*(-1):iDate++;}for(var w=2;w<7;w++){for(var d=0;d<7;d++){aMonth[w][d]=(iDate<=iDaysInMonth)?iDate++:(iNext++)*(-1);}}return aMonth;}  
function fDrawCal(iYear,iMonth,iCellHeight,iDateTextSize){  
    var colorTD=" bgcolor='"+gcMouseOut+"' bordercolor='"+gcMouseOut+"'";  
    var styleTD=" valign='middle' align='center' style='height:"+iCellHeight+"px !important;font-weight:bolder;font-size:"+iDateTextSize+"px;";  
    var dateCal="";  
    dateCal+="<tr>";  
    for(var i=0;i<7;i++){  
        dateCal+="<td "+colorTD+styleTD+"color:#990099'>"+WeekDay[i]+"</td>";  
    }  
    dateCal+="</tr>";  
    for(var w=1;w<7;w++){  
        dateCal+="<tr>";  
        for(var d=0;d<7;d++){  
            var tmpid=w+""+d;  
            dateCal+="<td"+styleTD+"cursor:pointer;' onclick='fSetSelected("+tmpid+")'>";  
            dateCal+="<span id='cellText"+tmpid+"'></span>";  
            dateCal+="</td>";  
        }  
        dateCal+="</tr>";  
    }  
    return dateCal;  
}  
function fUpdateCal(iYear,iMonth){  
    var myMonth=fBuildCal(iYear,iMonth);  
    var i=0;  
    var aDates = gdCtrl.value.split('-')  
    for(var w=1;w<7;w++){  
        for(var d=0;d<7;d++){  
            with($$("cellText"+w+""+d)){  
                parentNode.bgColor=gcMouseOut;  
                parentNode.borderColor=gcMouseOut;  
                parentNode.onmouseover=function(){  
                    this.bgColor=gcMouseOver;  
                };  
                parentNode.onmouseout=function(){  
                    this.bgColor=gcMouseOut;  
                };  
                if(myMonth[w][d]<0){  
                    style.color=gcNotCurMonth;  
                    innerHTML=Math.abs(myMonth[w][d]);  
                }else{  
                    style.color=((d==0)||(d==6))?gcRestDay:gcWorkDay;  
                    innerHTML=myMonth[w][d];  
                      
                    if(iYear==giYear && iMonth==giMonth && myMonth[w][d]==giDay){  
                        style.color=gcToday;  
                        parentNode.bgColor=gcTodayMouseOut;  
                        parentNode.onmouseover=function(){  
                            this.bgColor=gcTodayMouseOver;  
                        };  
                        parentNode.onmouseout=function(){  
                            this.bgColor=gcTodayMouseOut;  
                        };  
                    }  
                    if(aDates.length == 3 && iYear==aDates[0] && iMonth==aDates[1] && myMonth[w][d]==aDates[2]){  
                        style.color=gcToday;  
                        parentNode.bgColor='#ffdd66';  
                        parentNode.onmouseover=function(){  
                            this.bgColor='#ffdd66';  
                        };  
                        parentNode.onmouseout=function(){  
                            this.bgColor='#ffdd66';  
                        };  
                    }  
  
                }  
            }  
        }  
    }  
}  
function fSetYearMon(iYear,iMon){$$("tbSelMonth").options[iMon-1].selected=true;for(var i=0;i<$$("tbSelYear").length;i++){if($$("tbSelYear").options[i].value==iYear){$$("tbSelYear").options[i].selected=true;}}fUpdateCal(iYear,iMon);}  
function fPrevMonth(){var iMon=$$("tbSelMonth").value;var iYear=$$("tbSelYear").value;if(--iMon<1){iMon=12;iYear--;}fSetYearMon(iYear,iMon);}  
function fNextMonth(){var iMon=$$("tbSelMonth").value;var iYear=$$("tbSelYear").value;if(++iMon>12){iMon=1;iYear++;}fSetYearMon(iYear,iMon);}  
function fGetXY(aTag){  
    var oTmp=aTag;  
    var pt=new Point(0,0);  
    do{  
        pt.x+=oTmp.offsetLeft;  
        pt.y+=oTmp.offsetTop;  
        if(oTmp.offsetParent){  
            oTmp=oTmp.offsetParent;  
        }else{  
            break;  
        }  
    }while(oTmp.tagName.toUpperCase()!="BODY");  
    return pt;  
}  
function getDateDiv(){  
    var noSelectForIE="";  
    var noSelectForFireFox="";  
    if(document.all){  
        noSelectForIE="onselectstart='return false;'";  
    }else{  
        noSelectForFireFox="-moz-user-select:none;";  
    }  
    var dateDiv="";  
    dateDiv += "<div id='calendardiv'  onclick='event.cancelBubble=true' " + noSelectForIE + " style='" + noSelectForFireFox + "position:absolute;z-index:99999;visibility:hidden;border:1px solid #999999;width:174px;'>";  
    dateDiv += "<table border='0' bgcolor='#E0E0E0' cellpadding='1' cellspacing='1' width='100%'  >";  
    dateDiv+="<tr>";  
    dateDiv+="<td><input type='button' id='PrevMonth' value='<' style='height:20px;width:20px;font-weight:bolder;' onclick='fPrevMonth()'>";  
    dateDiv+="</td><td><select id='tbSelYear' style='border:1px solid;' onchange='fUpdateCal($V(\"tbSelYear\"),$V(\"tbSelMonth\"))'>";  
    for(var i=startYear;i<endYear;i++){  
        dateDiv+="<option value='"+i+"'>"+i+strYear+"</option>";  
    }  
    dateDiv+="</select></td><td>";  
    dateDiv+="<select id='tbSelMonth' style='border:1px solid;' onchange='fUpdateCal($V(\"tbSelYear\"),$V(\"tbSelMonth\"))'>";  
    for(var i=0;i<12;i++){  
        dateDiv+="<option value='"+(i+1)+"'>"+gMonths[i]+"</option>";  
    }  
    dateDiv+="</select></td><td>";  
    dateDiv+="<input type='button' id='NextMonth' value='>' style='height:20px;width:20px;font-weight:bolder;' onclick='fNextMonth()'>";  
    dateDiv+="</td>";dateDiv+="</tr><tr>";  
    dateDiv+="<td align='center' colspan='4'>";  
    dateDiv+="<div style='background-color:#cccccc'><table width='100%' border='0' cellpadding='3' cellspacing='1'>";  
    dateDiv+=fDrawCal(giYear,giMonth,dayTdHeight,dayTdTextSize);  
    dateDiv+="</table></div>";  
    dateDiv+="</td>";  
    dateDiv+="</tr><tr><td align='center' colspan='4' nowrap>";  
    dateDiv+="<span onclick=\"clearDate();\" style=\"font-size:12px;cursor:pointer;\"  onmouseover='this.style.color=\""+gcMouseOver+"\"' onmouseout='this.style.color=\"#000000\"'>清空</span>      <span style='cursor:pointer; font-size:12px' onclick='fSetDate(giYear,giMonth,giDay)' onmouseover='this.style.color=\""+gcMouseOver+"\"' onmouseout='this.style.color=\"#000000\"'>"+strToday+":"+giYear+strYear+giMonth+strMonth+giDay+strDay+"</span>";  
    dateDiv+="</tr></tr>";  
    dateDiv+="</table><iframe style='position:absolute; left:0px;top:0px;width:174px;height:190px;z-index:-1;' frameborder='0'></iframe></div>";  
    return dateDiv;  
}  
with(document){onclick=fHideCalendar;write(getDateDiv());}  
  
  
// 对Date的扩展，将 Date 转化为指定格式的String   
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，   
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)   
// 例子：   
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423   
// (new Date()).Format("yyyy-M-d h:m:s.S") ==> 2006-7-2 8:9:4.18   
Date.prototype.Format = function(fmt){  
    var o = {   
        "M+" : this.getMonth()+1, //月份   
        "d+" : this.getDate(), //日   
        "h+" : this.getHours(), //小时   
        "m+" : this.getMinutes(), //分   
        "s+" : this.getSeconds(), //秒   
        "q+" : Math.floor((this.getMonth()+3)/3), //季度   
        "S" : this.getMilliseconds() //毫秒   
    };   
    if(/(y+)/.test(fmt))   
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
        for(var k in o)   
            if(new RegExp("("+ k +")").test(fmt))   
                fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
    return fmt;   
      
}  