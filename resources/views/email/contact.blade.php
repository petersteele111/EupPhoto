<div style="max-width: 600px; margin: auto; background: #333; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.15); padding: 20px; color: #fff;">
    <img style="height: 100px; width: auto; display: block; margin: auto;" src="{{asset('img/logo_200x134_min.png')}}" alt="EUP Photography Logo" />

    <div style="padding: 20px;">
        <p style="font-size: 18px; margin-bottom: 10px;">Name: <span style="font-weight: normal; color: #fff;">{{ $name }}</span></p>
        <p style="font-size: 18px; margin-bottom: 10px;">Email: <span style="font-weight: normal; color: #fff;">{{ $email }}</span></p>
        <p style="font-size: 18px; margin-bottom: 10px;">Phone: <span style="font-weight: normal; color: #fff;">{{ $phone }}</span></p>
        <p style="font-size: 18px; margin-bottom: 10px; word-wrap: break-word;">Message: <span style="font-weight: normal; color: #fff;"><br/>{{ $userMessage }}</span></p>
    </div>

    <p style="font-size: 14px; color: #bbb; margin-top: 20px;">Submitted via EUPPhotography.com on the Contact Page</p>
</div>