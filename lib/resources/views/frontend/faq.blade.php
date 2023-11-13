@extends('frontend.master')
@section('title','FAQ')
@section('main')
<div id="detail">
        <div class="container_header container">
            <div class="container_header-list">
                <a href="{{asset('/')}}">BigStuffed</a>

                <span>></span>

               
                <p>Các câu hỏi thường gặp</p>
            </div>
        </div>
        <div class="list_content-header ">
            Các câu hỏi thường gặp
        </div>
        <div class="container">
            <div class="user_info-header faq_margin">
                Vận chuyển
            </div>
            <div class="detail_content container">
                <div class="accordion " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item detail_content-nav-info ">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button detail_content-nav-info-button faq-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Bạn có gửi hàng ra nước ngoài không?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse  detail_content-nav-info-body" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                        <p>BigStuffed vận chuyển trên toàn thế giới.</p> 
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button detail_content-nav-info-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Bao nhiêu lâu đơn hàng của tôi được vận chuyển tới.
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <p>Nó phụ thuộc vào bạn đang ở đâu.<br>

                                Vui lòng đợi 1-2 ngày làm việc để vận chuyển sau khi đơn đặt hàng của bạn được xác nhận. Thời gian giao hàng có thể mất từ ​​2 đến 14 ngày sau khi hàng được vận chuyển tùy theo điểm đến.<br>
                                
                                Chi tiết giao hàng sẽ được cung cấp trong email xác nhận của bạn.</p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed detail_content-nav-info-button faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Bạn có thể cung cấp theo dõi vận chuyển trên toàn thế giới?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <p>Nếu bạn gặp phải sự chậm trễ trong việc giao hàng, vui lòng liên hệ với chúng tôi.<br>

                                Nếu gói hàng của bạn không có người nhận, nó sẽ được gửi lại cho chúng tôi. Chúng tôi sẽ liên hệ với bạn để xác định xem đơn đặt hàng có nên được gửi lại hoặc hoàn lại tiền hay không.<br>
                                
                                Nếu người mua không quay lại với chúng tôi trong vòng 31 ngày, đơn đặt hàng sẽ không thể được gửi lại hoặc hoàn lại tiền.</p>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>

<div class="user_info-header faq_margin">
    Sản phẩm
</div>

<div class="detail_content container">
    <div class="accordion " id="accordionPanelsStayOpenExample">
        <div class="accordion-item detail_content-nav-info ">
            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button detail_content-nav-info-button faq-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                Tôi có thể cá nhân hóa sản phẩm của mình không?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse  detail_content-nav-info-body" aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
            <p>Chúng tôi không thực hiện đơn đặt hàng tùy chỉnh.</p> 
            </div>
            </div>
        </div>
        <div class="accordion-item detail_content-nav-info">
            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button detail_content-nav-info-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                Tôi Bảo quản BigStuffed của mình như thế nào?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseFive" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingFive">
            <div class="accordion-body">
                <p>Chúng tôi khuyên bạn nên giặt chúng bằng tay với nước sạch và để khô tự nhiên. Chúng tôi đặc biệt khuyên bạn không nên giặt máy vì nó có thể làm biến dạng lớp đệm của chúng.</p>
            </div>
            </div>
        </div>
        <div class="accordion-item detail_content-nav-info">
            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
            <button class="accordion-button collapsed detail_content-nav-info-button faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                BigStuffed có phù hợp với trẻ em không?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseSix" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingSix">
            <div class="accordion-body">
                <p>Tất cả BigStuffed của chúng tôi đều Thích hợp cho trẻ em và đã vượt qua Tiêu chuẩn CE EU.</p>
            </div>
            </div>

            <div class="user_info-header faq_margin">
                Đơn hàng
            </div>
            
            <div class="detail_content container">
                <div class="accordion " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item detail_content-nav-info ">
                        <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                        <button class="accordion-button detail_content-nav-info-button faq-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeven">
                            Tôi có thể thay đổi đơn đặt hàng của mình không?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse  detail_content-nav-info-body" aria-labelledby="panelsStayOpen-headingSeven">
                        <div class="accordion-body">
                        <p>Một khi đơn đặt hàng được xác nhận, nó không thể được thay đổi.</p> 
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                        <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                        <button class="accordion-button detail_content-nav-info-button faq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                            Tôi có thể hủy đơn hàng của mình không?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseEight" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingEight">
                        <div class="accordion-body">
                            <p>Một khi đơn đặt hàng được xác nhận, nó không thể bị hủy bỏ.</p>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item detail_content-nav-info">
                        <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                        <button class="accordion-button collapsed detail_content-nav-info-button faq-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                            Làm cách nào để theo dõi đơn hàng của tôi?
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseNine" class="accordion-collapse detail_content-nav-info-body collapse" aria-labelledby="panelsStayOpen-headingNine">
                        <div class="accordion-body">
                            <p>Sau khi đơn đặt hàng của bạn được xử lý, chúng tôi sẽ gửi cho bạn số theo dõi qua email. Bạn có thể theo dõi quá trình giao BigStuffed của mình bất cứ lúc nào.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
                    <div class="user_info-header faq_margin">
                       Những thắc mắc khác
                    </div>
                    <div class="content_info-faq">
						@include('errors.note')
                       
                        <form role="form" method="post">      
                            <input name="name" type="text" class="feedback-input" placeholder="Name" />   
                            <input name="email" type="text" class="feedback-input" placeholder="Email" />
                            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
                            <input type="submit" value="SUBMIT"/>
                            {{csrf_field()}}
                          </form>
                    </div>
        </div>
@stop