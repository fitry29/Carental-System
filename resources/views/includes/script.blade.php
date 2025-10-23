    <!--   Core JS Files   -->
    <script src="{{ asset('import/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('import/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('import/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('import/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('import/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('import/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('import/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('import/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('import/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('import/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('import/assets/js/kaiadmin.min.js') }}"></script>

    
    <!-- <script>
          $(document).ready(function(){
            $('#course_id').change(function(){
              var course_id = $(this).val();
              if(course_id){
                $.ajax({
                  url: '/getClass/'+course_id,
                  type: "GET",
                  dataType: "json",
                  success:function(data){
                    $('#class_id').empty();
                    $.each(data, function(index, item){
                      $('#class_id').append('<option value = "' + item.id +'" >' + item.classes_name + '</option>')
                    })

                    // alert('Get Success');
                    // console.log(data);
                  }
                });
              }else{
                  $('#class_id').empty();
              }
            });
          });
    </script> -->

    <!-- <script>
        var total_student;
        $.ajax({
          url: '/countStudents',
          type: "GET",
          dataType: "json",
          success:function(data){
            // $('#count_student').empty();
             
               $('#total_students').append(data);

               total_student = data;
            // alert('Get Success');
            // console.log(data);
          }
        });

        var total_courses;
        $.ajax({
          url: '/countCourses',
          type: "GET",
          dataType: "json",
          success:function(data){
            // $('#count_student').empty();
             
               $('#total_courses').append(data);
               total_courses = data;
            // alert('Get Success');
            // console.log(data);
          }
        });

        var total_classes;
        $.ajax({
          url: '/countClasses',
          type: "GET",
          dataType: "json",
          success:function(data){
            // $('#count_student').empty();
             
               $('#total_classes').append(data);

               total_classes = data;
            // alert('Get Success');
            // console.log(data);
          }
        });
    </script> -->
<!-- 
    <script>
        
        var countCs = 0, countAcc = 0, countCe = 0, countElec = 0, countGd = 0;
        var countAll = 0;
        $.ajax({
          url: '/studentsJson',
          type: "GET",
          dataType: "json",
          async:false,
          success:function(data){
            $.each(data, function(index, item){
                      countAll++;
                      if(item.course_id == 1){
                        countCs++;
                      }else if(item.course_id == 2){
                        countAcc++;
                      }else if(item.course_id == 3){
                        countCe++;
                      }else if(item.course_id == 4){
                        countElec++;
                      }else if(item.course_id == 5){
                        countGd++;
                      }
                    });
            // alert('Get Success');
            // console.log(countAll);
            // console.log(countAcc);
          }
        });

        function getPercent(partialVal){
            totalPercent = (100 * partialVal) / countAll;

            return totalPercent.toFixed();
        }

        percentArray = [getPercent(countCs), getPercent(countAcc), getPercent(countCe), getPercent(countElec), getPercent(countGd)];

        console.log(percentArray);

        var myPieChart = new Chart(pieChart, {
        type: "pie",
        data: {
          datasets: [
            {
              data: percentArray,
              backgroundColor: ["#1d7af3", "#FFD95F", "#fdaf4b", "#A62C2C", "#211C84"],
              borderWidth: 0,
            },
          ],
          labels: ["CS110", "ACC110", "CE120",  "ELE210", "GD310"],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: "bottom",
            labels: {
              fontColor: "rgb(154, 154, 154)",
              fontSize: 11,
              usePointStyle: true,
              padding: 20,
            },
          },
          pieceLabel: {
            render: "percentage",
            fontColor: "white",
            fontSize: 14,
          },
          tooltips: false,
          layout: {
            padding: {
              left: 20,
              right: 20,
              top: 20,
              bottom: 20,
            },
          },
        },
      });
    </script> -->
<!-- <script>
    document.querySelector('.select-car-btn').forEach(button => {
        button.addEventListener('click', function (e){
            e.preventDefault();
            
            // ambil semua data dari butang
            const car = {
                id: this.dataset.id,
                brand: this.dataset.brand,
                model: this.dataset.model,
                year: this.dataset.year,
                plate_number: this.dataset.plate,
                rental_price: this.dataset.price,
                category: this.dataset.category
            };

            // Masukkan ke hidden input dalam form
            document.getElementById('car_id').value = car.id;

            document.getElementById('car_brand').innerHTML = car.brand;
            document.getElementById('car_model').innerHTML = car.model;
            document.getElementById('car_year').innerHTML = car.year;
            document.getElementById('car_plate').innerHTML = car.plate;
            document.getElementById('car_price').innerHTML = car.price;
            document.getElementById('car_category').innerHTML = car.category;
        });
    });
</script> -->

    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });
      });
    </script>

    <!-- Untuk view password -->
    <script>
        document.getElementById('showPasswordCheckbox').addEventListener('change', function () {
          const input = document.getElementById('password');
          input.type = this.checked ? 'text' : 'password';
        });
    </script>
    <!-- Untuk Phone auto masuk +60 -->
    <script>
      document.getElementById('phone').addEventListener('blur', function() {
          if (!this.value.startsWith('+60')) {
              this.value = '+60' + this.value.replace(/^0/, ''); 
          }
      });
    </script>

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
