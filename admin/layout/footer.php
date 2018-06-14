            </div>
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Storm Store Website 2017</small>
                    </div>
                </div>
            </footer>
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <script src="/public/admin/vendor/jquery/jquery.min.js"></script>
            <script src="/public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="/public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="/public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="/public/admin/js/sb-admin.min.js"></script>
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
			$.each(data.product, function(index,row){
				categories.push(row.name);
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
				    	plugins: {
					datalabels: {
						backgroundColor: function(context) {
							return context.dataset.backgroundColor;
						},
						borderRadius: 4,
						color: 'white',
						font: {
							weight: 'bold'
						},
						formatter: Math.round,
						anchor: 'end',
						align: 'start'
					}
				},
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true
				                }
				            }]
				        }
				    }
				});


		}else{
			console.log(data.message);
		}
	}).fail(function(jqXHR, statusText, errorThrown){
		console.log("Fail:"+jqXHR.responseText);
		console.log(statusText);
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
        </div>
    </body>
    </html>