<?php
include 'connect.php';
session_start();
?>

    <html>

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="css/From.css">
        <link rel="icon" href="image/3.icon">
        <title> دليل الخدمات الالكترونية </title>
        <style>
            /* Style the tab */
            
            .tab {
                overflow: hidden;
                background-color: #f1f1f1;
            }
            /* Style the buttons that are used to open the tab content */
            
            .tab button {
                color: #555555;
                background-color: inherit;
                float: right;
                border: none;
                cursor: pointer;
                font-size: 15px;
                border: 1px solid #ccc;
                transition: 0.3s;
            }
            /* Change background color of buttons on hover */
            
            .tab button:hover {
                background-color: #ddd;
            }
            /* Create an active/current tablink class */
            
            .tab button.active {
                background-color:white;
            }
            /* Style the tab content */
            
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border-top: none;
                border: 1px solid #ccc;
                color: #555555;
                font-size: 20px;
                background:white;
            }
        </style>

    </head>

    <body>
    
        <header>


            <div class="container">
                <dir class="logo">
                    <img src="image/5.png">
                </dir>

                <div id="brand">
                    <h2> شروط  وتعليمات الخدمات الالكترونية </h2>
                </div>
                
            </div>
            

        </header><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <!-- Tab links -->
            
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'asdar')"> <h3>أصدار/ جواز سفر للرجال  </h3></button>
                <button class="tablinks" onclick="openCity(event, 'molod')"> <h3>أصدار جواز سفر للنساء  </h3></button>
                <button class="tablinks" onclick="openCity(event, 'add')"> <h3>    جواز السفر للاصفال </h3></button>
                <button class="tablinks" onclick="openCity(event, 'talef')"> <h3> تجديد جواز سفر    </h3></button>
                <button class="tablinks" onclick="openCity(event, 'focd')"> <h3>اجراءات فقدان جواز السفر   </h3></button>
                <button class="tablinks" onclick="openCity(event, 'jop')"> <h3>اجراءات بدل تالف </h3></button>
                <button class="tablinks" onclick="openCity(event, 'tat')"> <h3>اجراءات تعديل بيانات المهنة    </h3></button>
            </div>
     
            <!-- Tab content -->
            <div id="asdar" class="tabcontent">
            <h3><strong>- شروط قطع جواز للرجال</strong></h3>
                <ol>
                <li>توفير بطاقة شخصية وان تكون ما قبل 2015 وفي حالة انها حديثة ضرورة ارفاق وثيقة اخرى اصل </li>
                <li>ان لا يقل عمره عن 16 سنة</li>
                <li>شهادة الميلاد الاجنبية في حال انه من مواليد الخارج </li>
                <li>جواز دخول اليمن أو الاضافة في حال انه من مواليد الخارج</li>
                <li>بطاقة الاب او جوازه في حال انه من مواليد الخارج</li>
                <li>ان تكون الوثائق المطلوبة احضارها هي وثائق أصل</li>
                </ol>
            </div>

            <div id="molod" class="tabcontent">

                <h3> <strong> - شروط قطع جواز للنساء</strong></h3>
                <ol>
                <li>توفير الشروط السابقة الخاصة بالرجال </li>
                <li>توفير بطاقة الاب للمرأة العازبة وحضور ولي الامر او وكالة من ولي الامر لوكيل بقطع الجواز</li>
                <li>توفير البطاقة العائلية للمرأة المتزوجة او عقد الزواج وبطاقة الزوج وحضوره او وكالة من الزوج &nbsp;لوكيل بقطع الجواز</li>
                <li>توفير وثيقة الطلاق للمطلقة وبطاقة ولي الامر وحضوره او وكالة لوكيل </li>
                <li>توفير شهادة الوفاة للأرملة وبطاقة عائلية او عقد الزواج وبطاقة ولي الامر وحضوره او وكالة من ولي الامر لوكيل بقطع الجواز</li>
                </ol>
            </div>

            <div id="add" class="tabcontent">
             <h3><strong> - شروط قطع جواز للأطفال </strong></h3>
                    <ol>
                    <li>ان يكون عمره ما دون 16 سنة </li>
                    <li>شهادة الميلاد الاصل</li>
                    <li>بطاقة ولي الامر وحضوره أو وكالة من ولي الامر لوكيل بقطع الجواز</li>
                    <li>شهادة الميلاد الاجنبية &nbsp;وشهادة الميلاد اليمنية في حال انه من مواليد الخارج</li>
                    <li>جواز دخول اليمن أو الاضافة في حال انه من مواليد الخارج</li>
                    <li>بطاقة الاب او جوازه &nbsp;في حال انه من مواليد الخارج</li>
                    </ol>


            </div>
            <div id="talef" class="tabcontent">

                <h3> <strong> - شروط تجديد جواز</strong></h3>
                <ol>
                <li>توفير الشروط السابقة اللازم توفيرها في شروط قطع الجواز لأول مرة وبحسب الفئات المحددة </li>
                <li>احضار الجواز السابق</li>
                </ol>

            </div>
            <div id="focd" class="tabcontent">

                <h3> <strong> - شروط قطع جواز بدل فاقد </strong></h3>
                <ol>
                <li>توفير الشروط السابقة اللازم توفيرها في شروط قطع الجواز لأول مرة وبحسب الفئات المحددة</li>
                <li>بلاغ في قسم الشرطة واعلان في الصحيفة الرسمية والانتظار شهر من تاريخ البلاغ</li>
                </ol>



            </div>
            <div id="jop" class="tabcontent">

                <h3><strong> - شروط قطع جواز بدل تالف</strong></h3>
                <ol>
                <li>توفير الشروط السابقة اللازم توفيرها في شروط قطع الجواز لأول مرة وبحسب الفئات المحددة</li>
                <li>احضار الجواز السابق وان يكون الجواز تالف </li>
                </ol>
            </div>
            <div id="tat" class="tabcontent">
            <h3><strong> - شروط تعديل بيان  (تعديل اسم او تعديل لقب او عمر او مهنة)</strong></h3>
            <ol>
            <li>توفير الشروط السابقة اللازم توفيرها في شروط قطع الجواز لأول مرة وبحسب الفئات المحددة</li>
            <li>ان يكون لديه الوثيقة التي تثبت التعديل<br />
    
            </ol>
          </div>
        </div>

        </div>

        <script type="text/javascript ">
            function openCity(evt, cityName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>

    </body>
    <footer style="margin-top: 350px; ">


        <p> حقوق النشر جميع الحقوق محفوظة &copy; 2023 الموقع الرسمي لمصلحة الهجرة والجوازات والجنسية في الجمهورية اليمنية </p>
        <p> تصميم وتطوير Moh-Technology</p>
    </footer>

    </html>