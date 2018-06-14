<?php require_once __DIR__. "/autoload/autoload.php";
$category = $db->fetchAll("category");
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="row"> 
    <div class="col-lg-12">    
        <h1><?php echo $_SESSION['admin_name'] ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Accounting</li>
        </ol>
    </div>
</div>    <canvas id="myChart" width="200" height="80"></canvas>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
$(document).ready(function(){
	$.ajax({
		url: 'getchartdata.php',
		method: 'POST',
		dataType: 'json',
		//data
	}).done(function(data){
		if(data.result){
			var categories = [];
			var numOfProduct = [];
			$.each(data.products, function(index,row){
				categories.push(row.categoryname);
				numOfProduct.push(row.NumOfProduct);
			})

				var ctx = document.getElementById("myChart").getContext('2d');
				var myChart = new Chart(ctx, {
				    type: 'bar',
				    data: {
				        labels: categories,
				        datasets: [{
				            label: 'Tổng số sản phẩm',
				            data: numOfProduct,
				            backgroundColor: getRandomColorArrays(categories.length),
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        plugins: {
        	datalabels: {
        		backgroundColor: function(context){
        			return context.dataset.backgroundColor;
        		},
        		borderRadius: 4,
        		color: 'black',
        		font: {
        			weight: 'bold'
        		},
        		formatter: Math.round,
        		anchor: 'end',
        		align: 'start'
        	}
        }
    }
});
			}else{
				console.log(data.message);
			}
		}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail: "+ jqXHR.responseText);
		console.log(errorThrown);
		}).always(function(){

		})
		})

function getRandomColor() {
  var letters = '0123456789ABCDEF'.split('');
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
function getRandomColorArrays(num) {
 
  var color = [];
  for (var i = 0; i < 6; i++) {
    color.push(getRandomColor());
  }
  return color;
}

</script>

<?php require_once __DIR__. "/layout/footer.php"; ?>