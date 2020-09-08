<?php 
session_start();

if($_SESSION['session']){

  $username=$_SESSION['fullname'] ;
}
else{
header("location: login.php");
}

include("includes/header.php");
include("includes/sidebar.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Yönetim Paneli</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Yönetim Paneli</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <?php
            $yorumlar=$db->prepare("SELECT * FROM yorumlar WHERE yorum_ust=?");
            $yorumlar->execute(array(0));
            $yorumlar->fetchAll(PDO::FETCH_ASSOC);
            $yorumsay=$yorumlar->rowCount();?>
              <div class="inner">
                <h3><?php echo $yorumsay; ?></h3>

                <p>YORUMLAR</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="comments.php" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <?php
            $yazilar=$db->prepare("SELECT * FROM yazilar");
            $yazilar->execute();
            $yazilar->fetchAll(PDO::FETCH_ASSOC);
            $yazisay=$yazilar->rowCount();?>
              <div class="inner">
                <h3><?php echo $yazisay; ?></h3>

                <p>YAZILAR </p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <a href="articles.php" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <?php
            $kategoriler=$db->prepare("SELECT * FROM kategoriler");
            $kategoriler->execute();
            $kategoriler->fetchAll(PDO::FETCH_ASSOC);
            $kategoricek=$kategoriler->rowCount();?>
              <div class="inner">
                <h3><?php echo $kategoricek; ?></h3>

                <p>KATEGORİLER</p>
              </div>
              <div class="icon">
                <i class="fa fa-tags"></i>
              </div>
              <a href="categories.php" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <?php
            $mesajlar=$db->prepare("SELECT * FROM mesajlar");
            $mesajlar->execute();
            $mesajlar->fetchAll(PDO::FETCH_ASSOC);
            $mesajcek=$mesajlar->rowCount();?>
              <div class="inner">
                <h3><?php echo $mesajcek; ?></h3>

                <p>MESAJLAR</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="messages.php" class="small-box-footer">Tümünü Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
         <!-- Calendar -->
         <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%">
                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                  <ul class="list-unstyled"><li class="show"><div class="datepicker">
                    <div class="datepicker-days" style="">
                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th>
                            <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">September 2020</th>
                            <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                          </tr>
                          <tr>
                            <th class="dow">Su</th>
                            <th class="dow">Mo</th>
                            <th class="dow">Tu</th>
                            <th class="dow">We</th>
                            <th class="dow">Th</th>
                            <th class="dow">Fr</th>
                            <th class="dow">Sa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td data-action="selectDay" data-day="08/30/2020" class="day old weekend">30</td>
                            <td data-action="selectDay" data-day="08/31/2020" class="day old">31</td>
                            <td data-action="selectDay" data-day="09/01/2020" class="day">1</td>
                            <td data-action="selectDay" data-day="09/02/2020" class="day">2</td>
                            <td data-action="selectDay" data-day="09/03/2020" class="day">3</td>
                            <td data-action="selectDay" data-day="09/04/2020" class="day">4</td>
                            <td data-action="selectDay" data-day="09/05/2020" class="day weekend">5</td>
                          </tr>
                          <tr>
                            <td data-action="selectDay" data-day="09/06/2020" class="day active today weekend">6</td>
                            <td data-action="selectDay" data-day="09/07/2020" class="day">7</td>
                            <td data-action="selectDay" data-day="09/08/2020" class="day">8</td>
                            <td data-action="selectDay" data-day="09/09/2020" class="day">9</td>
                            <td data-action="selectDay" data-day="09/10/2020" class="day">10</td>
                            <td data-action="selectDay" data-day="09/11/2020" class="day">11</td>
                            <td data-action="selectDay" data-day="09/12/2020" class="day weekend">12</td>
                          </tr>
                          <tr>
                            <td data-action="selectDay" data-day="09/13/2020" class="day weekend">13</td>
                            <td data-action="selectDay" data-day="09/14/2020" class="day">14</td>
                            <td data-action="selectDay" data-day="09/15/2020" class="day">15</td>
                            <td data-action="selectDay" data-day="09/16/2020" class="day">16</td>
                            <td data-action="selectDay" data-day="09/17/2020" class="day">17</td>
                            <td data-action="selectDay" data-day="09/18/2020" class="day">18</td>
                            <td data-action="selectDay" data-day="09/19/2020" class="day weekend">19</td>
                          </tr>
                          <tr>
                            <td data-action="selectDay" data-day="09/20/2020" class="day weekend">20</td>
                          <td data-action="selectDay" data-day="09/21/2020" class="day">21</td>
                          <td data-action="selectDay" data-day="09/22/2020" class="day">22</td>
                          <td data-action="selectDay" data-day="09/23/2020" class="day">23</td>
                          <td data-action="selectDay" data-day="09/24/2020" class="day">24</td>
                          <td data-action="selectDay" data-day="09/25/2020" class="day">25</td>
                          <td data-action="selectDay" data-day="09/26/2020" class="day weekend">26</td>
                        </tr><tr><td data-action="selectDay" data-day="09/27/2020" class="day weekend">27</td>
                        <td data-action="selectDay" data-day="09/28/2020" class="day">28</td>
                        <td data-action="selectDay" data-day="09/29/2020" class="day">29</td>
                        <td data-action="selectDay" data-day="09/30/2020" class="day">30</td>
                        <td data-action="selectDay" data-day="10/01/2020" class="day new">1</td>
                        <td data-action="selectDay" data-day="10/02/2020" class="day new">2</td>
                        <td data-action="selectDay" data-day="10/03/2020" class="day new weekend">3</td>
                      </tr><tr><td data-action="selectDay" data-day="10/04/2020" class="day new weekend">4</td>
                      <td data-action="selectDay" data-day="10/05/2020" class="day new">5</td>
                      <td data-action="selectDay" data-day="10/06/2020" class="day new">6</td>
                      <td data-action="selectDay" data-day="10/07/2020" class="day new">7</td>
                      <td data-action="selectDay" data-day="10/08/2020" class="day new">8</td>
                      <td data-action="selectDay" data-day="10/09/2020" class="day new">9</td>
                      <td data-action="selectDay" data-day="10/10/2020" class="day new weekend">10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="datepicker-months" style="display: none;">
              <table class="table-condensed">
                <thead>
                  <tr>
                    <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                    <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2020</th>
                    <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="7">
                      <span data-action="selectMonth" class="month">Jan</span>
                      <span data-action="selectMonth" class="month">Feb</span>
                      <span data-action="selectMonth" class="month">Mar</span>
                      <span data-action="selectMonth" class="month">Apr</span>
                      <span data-action="selectMonth" class="month">May</span>
                      <span data-action="selectMonth" class="month">Jun</span>
                      <span data-action="selectMonth" class="month">Jul</span>
                      <span data-action="selectMonth" class="month">Aug</span>
                      <span data-action="selectMonth" class="month active">Sep</span>
                      <span data-action="selectMonth" class="month">Oct</span>
                      <span data-action="selectMonth" class="month">Nov</span>
                      <span data-action="selectMonth" class="month">Dec</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="datepicker-years" style="display: none;">
            <table class="table-condensed">
              <thead>
                <tr>
                  <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                  <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                  <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="7"><span data-action="selectYear" class="year old">2019</span>
                  <span data-action="selectYear" class="year active">2020</span>
                  <span data-action="selectYear" class="year">2021</span>
                  <span data-action="selectYear" class="year">2022</span>
                  <span data-action="selectYear" class="year">2023</span>
                  <span data-action="selectYear" class="year">2024</span>
                  <span data-action="selectYear" class="year">2025</span>
                  <span data-action="selectYear" class="year">2026</span>
                  <span data-action="selectYear" class="year">2027</span>
                  <span data-action="selectYear" class="year">2028</span>
                  <span data-action="selectYear" class="year">2029</span>
                  <span data-action="selectYear" class="year old">2030</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="datepicker-decades" style="display: none;">
        <table class="table-condensed">
          <thead>
            <tr>
              <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
              <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
              <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="7">
                <span data-action="selectDecade" class="decade old" data-selection="2006">1990</span>
                <span data-action="selectDecade" class="decade" data-selection="2006">2000</span>
                <span data-action="selectDecade" class="decade active" data-selection="2016">2010</span>
                <span data-action="selectDecade" class="decade" data-selection="2026">2020</span>
                <span data-action="selectDecade" class="decade" data-selection="2036">2030</span>
                <span data-action="selectDecade" class="decade" data-selection="2046">2040</span>
                <span data-action="selectDecade" class="decade" data-selection="2056">2050</span>
                <span data-action="selectDecade" class="decade" data-selection="2066">2060</span>
                <span data-action="selectDecade" class="decade" data-selection="2076">2070</span>
                <span data-action="selectDecade" class="decade" data-selection="2086">2080</span>
                <span data-action="selectDecade" class="decade" data-selection="2096">2090</span>
                <span data-action="selectDecade" class="decade old" data-selection="2106">2100</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </li>
  <li class="picker-switch accordion-toggle"></li>
        </ul>
    </div>
</div>
              </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include("includes/footer.php"); 
?>