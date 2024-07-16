
<style>
    .logo-area {
        padding-bottom: 10px;
    }
</style>
</div>
<!--=====================================-->
<!--=   Breadcrumb     Start            =-->
<!--=====================================-->

<div class="breadcrumb-wrap breadcrumb-wrap-2">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</div>


<!--=====================================-->
<!--=   Grid     Start                  =-->
<!--=====================================-->

<section class="grid-wrap1 grid-wrap2">
    <div class="container">
     <h1>Privacy Policy</h1>
     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam sint nihil non labore eligendi temporibus perspiciatis quaerat, expedita illo. Quibusdam perspiciatis minima temporibus recusandae similique dignissimos cum iusto eveniet, alias nisi facilis, asperiores ipsum doloremque, facere tenetur beatae ratione ab in quisquam corrupti sit. In, praesentium cum blanditiis harum, perferendis ipsam delectus porro explicabo neque, voluptate consequatur id vel voluptatum doloremque qui. Commodi aliquid alias nostrum placeat tempora distinctio quibusdam corporis nulla, architecto quod. Unde quis magnam ut eum molestiae architecto ex voluptatum esse laboriosam quo, neque soluta sunt cupiditate optio perspiciatis dolore. Praesentium, voluptate officia culpa veniam fuga facilis tempora, officiis porro magni ipsa facere corporis maiores ex perspiciatis consequatur quae vel molestias amet sequi non. Deserunt quod asperiores harum nisi tempora sint saepe quidem labore, adipisci amet unde doloribus ipsa quas quasi? Delectus voluptatibus beatae animi exercitationem assumenda corrupti in, adipisci magnam dignissimos porro id corporis sed rem accusantium doloremque, facere molestiae voluptatem ab quae. Quas porro, illum similique obcaecati possimus sequi nemo fuga, ducimus quibusdam, dolor animi praesentium et ut ea quam at. Quidem, explicabo dicta quaerat ratione dolorem voluptate accusantium quia temporibus vero suscipit velit corrupti itaque deserunt labore enim incidunt repellat error necessitatibus corporis sint. Ipsa rem nemo voluptatum iure! Sit laborum cumque, dicta soluta id amet explicabo quasi iure incidunt voluptate. Voluptates porro eius nam officiis numquam veniam ad rem dicta nulla perferendis obcaecati eaque nihil, et sint ut quidem magni aspernatur sed voluptate id sapiente doloribus nisi consequatur. Blanditiis animi architecto tempore aliquid laudantium neque ipsam provident, omnis necessitatibus iusto ea id illo quas commodi excepturi sequi cumque. Eos laboriosam vitae harum modi corporis impedit eaque dignissimos alias, dolore necessitatibus? Quasi quis harum corporis. Quae ipsa sed suscipit commodi sint aperiam ipsam vero dignissimos et temporibus, animi totam illum. Assumenda fugiat culpa ea!</p>
    </div>
</section>
<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [0, 200],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    });
</script>