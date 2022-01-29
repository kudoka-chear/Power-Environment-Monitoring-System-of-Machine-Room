var dateYear=[];
var serverPower=[];
var airconditioningPower=[];
var waterPower=[];
var upsPower=[];
function getMsg(){
  let Num=7;
  axios.get("getMsg.php",{
    params:{
      'Num':Num
    }
  }).then((rep)=>{
    let repDate=rep.data;
//console.log(repDate);
    for(let i=0;i<Num;i++){
      //console.log(repDate[i].dateyear);
      dateYear[i]=repDate[i].dateyear;
      serverPower[i]=Number(repDate[i].aa1)+Number(repDate[i].bb1);
      airconditioningPower[i]=Number(repDate[i].kt1)+Number(repDate[i].kt3)+Number(repDate[i].kt4);
      waterPower[i]=Number(repDate[i].ap1)+Number(repDate[i].bp1);
      upsPower[i]=Number(repDate[i].uap1)+Number(repDate[i].ucp1)+Number(repDate[i].ubp1);
    }
    console.log(repDate);
    var myChart = echarts.init(document.getElementById('main'));
        // 指定图表的配置项和数据
        var option = {
          title : {
              text: '各组件用电量变化',
          },
          tooltip : {
              trigger: 'axis'
          },
          legend: {
              data:['服务器用电','配电室精密空调用电','室外冷水机组用电','UPS用电']
          },
          toolbox: {
              show : true,
              feature : {
                  mark : {show: true},
                  dataView : {show: true, readOnly: false},
                  magicType : {show: true, type: ['line', 'bar']},
                  restore : {show: true},
                  saveAsImage : {show: true}
              }
          },
          calculable : true,
          xAxis : [
              {
                  type : 'category',
                  boundaryGap : false,
                  data : [dateYear[6],dateYear[5],dateYear[4],dateYear[3],dateYear[2],dateYear[1],dateYear[0]]
                  //['2020/12/25','2020/12/26','2020/12/27','2020/12/28','2020/12/29','2020/12/30','2020/12/31']
              }
          ],
          yAxis : [
              {
                  type : 'value',
                  axisLabel : {
                      formatter: '{value} '
                  }
              }
          ],
          series : [
              {
                  name:'服务器用电',
                  type:'line',
                  data:[serverPower[6],serverPower[5],serverPower[4],serverPower[3],serverPower[2],serverPower[1],serverPower[0]],
                  //[1937.20, 2028.80, 2062.80, 2053.60, 1945.60, 1995.20, 2054.80 ],
                  markPoint : {
                      data : [
                         
                      ]
                  },
                  markLine : {
                      data : [
                          {type : 'average', name: '平均值'}
                      ]
                  }
              },
              {
                  name:'配电室精密空调用电',
                  type:'line',
                  data:[airconditioningPower[6],airconditioningPower[5],airconditioningPower[4],airconditioningPower[3],airconditioningPower[2],airconditioningPower[1],airconditioningPower[0]],
                  //[118.52 , 114.12 , 117.96, 116.46, 116.48, 118.07, 123.06],


                  markPoint : {
                      data : [
                          
                      ]
                  },
                  markLine : {
                      data : [
                          {type : 'average', name : '平均值'}
                      ]
                  }
              },
               {
                  name:'室外冷水机组用电',
                  type:'line',
                  data:[waterPower[6],waterPower[5],waterPower[4],waterPower[3],waterPower[2],waterPower[1],waterPower[0]],
                  //[163.32, 221.12, 230.08, 757.76 ,431.12 , 418.52 , 419.36],
                  markPoint : {
                      data : [
                          
                      ]
                  },
                  markLine : {
                      data : [
                          {type : 'average', name : '平均值'}
                      ]
                  }
               },
               {
                  name:'UPS用电',
                  type:'line',
                  data:[upsPower[6],upsPower[5],upsPower[4],upsPower[3],upsPower[2],upsPower[1],upsPower[0]],
                  //[1083.20 , 1133.60, 1152.80 , 1146.80 , 1088.00 , 1113.20 , 1147.60], 
                  markPoint : {
                      data : [
                         
                      ]
                  },
                  markLine : {
                      data : [
                          {type : 'average', name : '平均值'}
                      ]
                  }
               }
          ]
      };
                    
 
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
  }).catch((error)=>{
    console.error(error);

  })
}

window.onload=getMsg;

