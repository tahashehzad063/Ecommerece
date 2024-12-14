@include('main.header')
  <!-- This form uses the fabform.io form backend service -->
<!-- Used fabform.io form backend service --->

    <style>


        .contact-form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            /* margin: auto; */
            margin-left: 40px;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
 @if(session()->has('message'))
 <div class="alert alert-success">
    {{session()->get('message')}}
 </div>
 @endif
    <div class="row">

        <div class="contact-form col-4">
            <h2>Contact Us</h2>
        <form action="{{url('contac')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Email"  required>
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="number" id="phone" name="phone" placeholder="Phone Number" min="0"  required>
            </div>
            <div class="form-group">
                <label for="message"></label>
                <textarea id="message" name="message" rows="4" placeholder="Message"  required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
   
        </form>
    </div>
<div class="col-6 justify-content-end d-flex">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56146.70623134586!2d70.26280270738421!3d28.414152793598767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39375c713b45db39%3A0x28af23c1672a0170!2sRahim%20Yar%20Khan%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1706619039989!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

</div>
    
        @include('main/tagsjs')