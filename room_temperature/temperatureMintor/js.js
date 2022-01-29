var dateTime=[];
var valueT=new Array();
var valueH=new Array();
var position=[];

function getTem() {
    let dayNum=7;
    let positionNum=6;
	let Num=dayNum*positionNum;
    for(var i=0;i<positionNum;i++){
        valueH[i]=new Array();
        valueT[i]=new Array();
    }
    //valueT[1][0]="12";
    //console.log(valueT);
  	axios.get("getTem.php",{
	    params:{
	      'Num':Num
	    }
  	}).then((rep)=>{
  		let repData=rep.data;
        let j=0;
        let index=0;
  		for (var i = 0; i <Num; i++) {
            if(j==positionNum-1){
                j=0;
                dateTime[index++]=repData[i].dateTime;
            }
            console.log(repData);
  			valueT[Number(repData[i].position)-1][index]=Number(repData[i].valueT);
  			valueH[Number(repData[i].position)-1][index]=Number(repData[i].valueH);
  			j++;
  		}
  		
var chartDom = document.getElementById('main');
var myChart = echarts.init(chartDom);
var option;

option = {
    title: {
        text: '温度监控（近一周）'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['地下大厅-南','地下大厅-北', '新校区', '图书馆601-3', '图书馆601-2','图书馆601-1']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
    	show : true,
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name: '地下大厅-南',
            type: 'line',
            stack: '总量',
            data: [120, 132, 101, 134, 90, 230, 210]
        },
        {
            name: '地下大厅-北',
            type: 'line',
            stack: '总量',
            data: [220, 182, 191, 234, 290, 330, 310]
        },
        {
            name: '新校区',
            type: 'line',
            stack: '总量',
            data: [150, 232, 201, 154, 190, 330, 410]
        },
        {
            name: '图书馆601-3',
            type: 'line',
            stack: '总量',
            data: [320, 332, 301, 334, 390, 330, 320]
        },
        {
            name: '图书馆601-2',
            type: 'line',
            stack: '总量',
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        },
        {
            name: '图书馆601-1',
            type: 'line',
            stack: '总量',
            data: [820, 932, 901, 934, 1290, 1330, 1320]
        }
    ]
};

option && myChart.setOption(option);

  	}).catch((error)=>{
  		console.error(error);
  	})
}
window.onload=getTem;