<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Care X Pharmacy</title>

		<style>
		.btn {
  display: block;
  width: 40%;
  height: 50px;
  border-radius: 25px;
  outline: none;
  border-color: #fff;
  background-image: linear-gradient(to right, #009688, #38d39f, #009688);
  background-size: 200%;
    text-transform: uppercase;
  font-size: 0.9rem;
  color: #fff;
  font-family: 'Poppins', sans-serif;
 
  margin: 1rem 0;
  cursor: pointer;
  transition: .6s;
  margin-top: 50px;
  margin-left: 25px;
}
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
			.td{
				font-weight: bold;
			}


		</style>
	</head>

	<body>
	<div class="col-md-12 text-right mb-3">
        <button class="btn" id="download"> download pdf</button>
    </div>
	<div id="invoice">

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="images/img/home/care X logo.png" style="width: 80%; max-width: 120px" />
								</td>
								<td style="font-weight: bold;">
									<br />
									Care X Pharmacy<br />
									ST-13 Abul Hasan Isphahani Rd, Block 7 Gulshan-e-Iqbal<br />
									Karachi, Sindh 75300, Pakistan
								</td>
								<td>
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<!-- <td style="font-weight: bold;">
									Care X Pharmacy<br />
									ST-13 Abul Hasan Isphahani Rd, Block 7 Gulshan-e-Iqbal<br />
									Karachi, Sindh 75300, Pakistan
								</td> -->

								
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Order Details</td>

					
				</tr>

				
				

			</table>

			<table>
				<tbody id="table_tbody1">
					
				</tbody>
			</table>



			<div >
				<h2 style="margin-left: 17%;">Thanks For Purchasing with Care X Pharmacy</h2>
				<img src="images/img/order.png" style="width: 50%; max-width: 100px; margin-left: 35%;">
				<h1 style="margin-left: 23%; ">Your Order Is Confirmed</h1>
			</div>
		</div>

	</div>
	</body>
</html>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.2/dist/sweetalert2.all.min.js"></script>
<!--<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js"></script>-->
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script>
	
// 	window.onload = function () {
//     // document.getElementById("download")
//     //     .addEventListener("click", () => {
//     //         const invoice = this.document.getElementById("invoice");
//     //         console.log(invoice);
//     //         console.log(window);
//     //         var opt = {
//     //             margin: 1,
//     //             filename: 'Invoice.pdf',
//     //             image: { type: 'jpeg', quality: 0.98 },
//     //             html2canvas: { scale: 2 },
//     //             jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
//     //         };
//     //         html2pdf().from(invoice).set(opt).save();
//     //     })
// }

	//FIREBASE

        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCwL-AtDqq-jdMBYNi1nTo5NNAtHwMhhHc",
            authDomain: "appointment-sys-3fb2e.firebaseapp.com",
            databaseURL: "https://appointment-sys-3fb2e-default-rtdb.firebaseio.com",
            projectId: "appointment-sys-3fb2e",
            storageBucket: "appointment-sys-3fb2e.appspot.com",
            messagingSenderId: "167244005815",
            appId: "1:167244005815:web:ea60f2c06b25a4660ce832"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

//Order Id will come dynamically
        var Order_Id;
    window.onload = function () {
        
		if (window.location.search.split('?').length > 0) {
			var params = window.location.search.split('?')[1];
			Order_Id = params.split('=')[1]; 
        }

		document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Invoice.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
    };



	firebase.database().ref("orders/").on('value', function(snapshot){
        var value = snapshot.val();
        $.each(value, function (index, value) {
        if(value && index==Order_Id) {
                    $('#table_tbody1').append( `

			<tr>
                <td style="font-weight: bold;">Order Id:</td>
                <td>${value.order}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Name:</td>
                <td>${value.userName}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Address:</td>
                <td>${value.userAddress}</td>
            </tr>
            
            <tr>
                <td style="font-weight: bold;">Date:</td>
                <td>${value.date}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Time:</td>
                <td>${value.hour}</td>
            </tr>
			<tr>
                <td style="font-weight: bold;">Year:</td>
                <td>${value.year}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Products:</td>
                <td>${value.products.map(function(product){
                    return `<ul>
                            <li>Name: ${product.name}</li>
                            <li>Power: ${product.power}</li>
                            <li>Price: ${product.price}</li>
                            <li>Quantity: ${product.quantity}</li>
                            <li>Sub Total: ${product.total}</li>
                        </ul>`;
                    })}</td>
            </tr>

			<tr>
                <td style="font-weight: bold;">Payment Method:</td>
                <td style="font-weight: bold;">${value.payment}</td>
            </tr>
            
            <tr>
                <td style="font-weight: bold;">Total Amount:</td>
                <td style="font-weight: bold;">${value.total}</td>
            </tr>
        
    ` )
        }
        });
					
                });

</script>