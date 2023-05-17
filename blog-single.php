<?php
session_start();
ob_start();
include 'admin/conec.php';
global $conn;
if (isset($_SESSION['member']) && $_SESSION['member']) {
  include 'parts/nav-login.php';
} else {
  include 'parts/nav.php';
}
?>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="index.html">Nhật ký <i class="fa fa-chevron-right"></i></a></span> <span>Bài viết <i class="fa fa-chevron-right"></i></span></p>
        <h1 class="mb-0 bread">Chi Tiết Bài Viết</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
        <h2 class="mb-3">#1. Đó là một thực tế đã được thiết lập từ lâu khiến người đọc bị phân tâm</h2>
        <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Từ chối, sự kiên cường của anh ấy chiếm lấy, có ai chịu đựng nỗi đau và sự khác biệt và đau đớn từ lựa chọn khó nhọc của kiến ​​​​trúc sư để tiếp tục đạt được những nhiệm vụ khôn ngoan mà không ai buộc tội cho đến nay? Là nhỏ nhất trừ khi và Bằng cách gánh chịu nỗi đau, cho tất cả hiện tại, và nỗi đau này, bởi vì nhiệm vụ là một lựa chọn, và những thú vui rắc rối bị kiến ​​​​trúc sư của thời đại từ bỏ.</p>
        <p>
          <img src="images/bg_5.jpg" alt="" class="img-fluid">
        </p>
        <p>Với khát khao của tâm hồn tìm đến nỗi đau, lựa chọn khôn ngoan nhất, đó là không ai chối bỏ sự thật, họ không biết đau! Bằng cách từ chối những công việc nhỏ nhất trong số những công việc vĩ đại, những người được khoái lạc giải thoát khỏi lạc thú, bất kỳ điều gì xảy đến với anh ta sẽ tình cờ được đảm nhận, và anh ta nhất định tuân theo nó, và anh ta nhất định sẽ mềm lòng trước nỗi đau, và anh ta chạy trốn khi anh ta nhìn thấy nó, anh ta ghét nó. Họ đâu biết rằng nỗi đau nhỏ nhoi đến mức phải từ chối!</p>
        <h2 class="mb-3 mt-5">#2. Chủ đề WordPress sáng tạo</h2>
        <p>Đôi khi, anh ấy thực hiện bài tập rắc rối ở đây, bị mù quáng bởi toàn bộ sự việc, hoặc của anh ấy. Tập thể dục, và thực sự là những thời điểm tuyệt vời hơn, từ kiến ​​​​trúc sư của những thú vui hay nhiệm vụ và nỗi đau. Lỗi, đau, sướng, tất cả rắc rối, đáng hận nhất, tội lỗi của họ, trừ khi nó kết quả với những người anh ta ghét, như thể anh ta đẩy lùi những người rơi vào sự chối bỏ nhiệm vụ, phải không? Bạn phải tận dụng nó, hoặc có được nó.</p>
        <p>
          <img src="images/bg_1.jpg" alt="" class="img-fluid">
        </p>
        <p>Bất cứ ai có thể là một chuyến bay phân biệt nào đó, thực sự được chọn để từ chối sự thật. Tôi sẽ không giải thích bất cứ điều gì bởi vì đó là họ. Vì vậy, anh ta không bị ràng buộc bởi thời gian, trừ khi anh ta phạm tội vì thích thú với những nhiệm vụ lớn hơn, hoặc anh ta đảm nhận không theo đuổi sự thật nào, mà vì anh ta không thích gánh vác chúng, nên họ được tự do. Lỗi, anh ấy muốn tiếp tục. Họ để lại ít hơn, vì một số điều này sẽ đến, nhưng vấn đề lớn hơn.</p>
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
        </div>

        <div class="about-author d-flex p-4 bg-light">
          <div class="bio mr-5">
            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc">
            <h3>George Washington</h3>
            <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Và vì vậy, chúng tôi dẫn dắt, nhưng đến những nhu cầu cần thiết một cách thích thú, được lựa chọn một cách linh hoạt, hoặc, hãy để chúng hài lòng, vì thực sự tội lỗi được người khôn ngoan theo đuổi, và những thứ tương tự, nhà phát minh không bao giờ thoát khỏi chúng bởi ham muốn!</p>
          </div>
        </div>


        <div class="pt-5 mt-5">
          <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">6 Bình luận</h3>
          <ul class="comment-list">
            <li class="comment">
              <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">September 11, 2020 at 2:21pm</div>
                <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Hãy để anh ta thực sự thoát khỏi nhu cầu lao động cần thiết, nhưng cuộc sống cản trở anh ta thực hiện nghĩa vụ của mình, vì người khôn ngoan này thường trốn tránh luật pháp! Không có gì cản trở niềm vui của họ từ sự cần thiết?</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>
            </li>

            <li class="comment">
              <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">September 11, 2020 at 2:21pm</div>
                <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Hãy để anh ta thực sự thoát khỏi nhu cầu lao động cần thiết, nhưng cuộc sống cản trở anh ta thực hiện nghĩa vụ của mình, vì người khôn ngoan này thường trốn tránh luật pháp! Không có gì cản trở niềm vui của họ từ sự cần thiết?</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>

              <ul class="children">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta">September 11, 2020 at 2:21pm</div>
                    <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Hãy để anh ta thực sự thoát khỏi nhu cầu lao động cần thiết, nhưng cuộc sống cản trở anh ta thực hiện nghĩa vụ của mình, vì người khôn ngoan này thường trốn tránh luật pháp! Không có gì cản trở niềm vui của họ từ sự cần thiết?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>


                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>John Doe</h3>
                        <div class="meta">September 11, 2020 at 2:21pm</div>
                        <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Hãy để anh ta thực sự thoát khỏi nhu cầu lao động cần thiết, nhưng cuộc sống cản trở anh ta thực hiện nghĩa vụ của mình, vì người khôn ngoan này thường trốn tránh luật pháp! Không có gì cản trở niềm vui của họ từ sự cần thiết?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="comment">
              <div class="vcard bio">
                <img src="images/person_1.jpg" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">September 11, 2020 at 2:21pm</div>
                <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Hãy để anh ta thực sự thoát khỏi nhu cầu lao động cần thiết, nhưng cuộc sống cản trở anh ta thực hiện nghĩa vụ của mình, vì người khôn ngoan này thường trốn tránh luật pháp! Không có gì cản trở niềm vui của họ từ sự cần thiết?</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>
            </li>
          </ul>
          <!-- END comment-list -->

          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Để lại bình luận</h3>
            <form action="#" class="p-5 bg-light">
              <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website">
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
              </div>

            </form>
          </div>
        </div>

      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
        <div class="sidebar-box pt-md-5">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon fa fa-search"></span>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Travel <span>(12)</span></a></li>
            <li><a href="#">Tour <span>(22)</span></a></li>
            <li><a href="#">Destination <span>(37)</span></a></li>
            <li><a href="#">Drinks <span>(42)</span></a></li>
            <li><a href="#">Foods <span>(14)</span></a></li>
            <li><a href="#">Travel <span>(140)</span></a></li>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="fa fa-calendar"></span> September 11, 2020</a></div>
                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="fa fa-calendar"></span> September 11, 2020</a></div>
                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="fa fa-calendar"></span> September 11, 2020</a></div>
                <div><a href="#"><span class="fa fa-user"></span> Admin</a></div>
                <div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">dish</a>
            <a href="#" class="tag-cloud-link">menu</a>
            <a href="#" class="tag-cloud-link">food</a>
            <a href="#" class="tag-cloud-link">sweet</a>
            <a href="#" class="tag-cloud-link">tasty</a>
            <a href="#" class="tag-cloud-link">delicious</a>
            <a href="#" class="tag-cloud-link">desserts</a>
            <a href="#" class="tag-cloud-link">drinks</a>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Paragraph</h3>
          <p>Điều rất quan trọng là khách hàng phải chú ý đến quá trình adipiscing. Và vì vậy, chúng tôi dẫn dắt, nhưng đến những nhu cầu cần thiết một cách thích thú, được lựa chọn một cách linh hoạt, hoặc, hãy để chúng hài lòng, vì thực sự tội lỗi được người khôn ngoan theo đuổi, và những thứ tương tự, nhà phát minh không bao giờ thoát khỏi chúng bởi ham muốn!</p>
        </div>
      </div>

    </div>
  </div>
</section> <!-- .section -->

<?php
include 'parts/advertisement.php'
?>

<?php
include 'parts/footer.php'
?>