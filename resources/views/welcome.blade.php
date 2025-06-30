<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modern Inline Form</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">

  @include('components.navbar')

  <div class="container" style="display: grid; place-items: center; min-height: 100vh; background: linear-gradient(135deg, #6f42c1, #007bff); ">
  
  


    <form method="POST" action="/submit-mood"
      style="background: #fff; padding: 30px; border-radius: 16px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); width: 100%; max-width: 500px; font-family: sans-serif; opacity: 0; animation: fadeIn 0.5s ease-in-out forwards;">

      @csrf

      @if ($errors->any())
  <div style="background-color: #f8d7da; color: #721c24; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
    <ul style="list-style: none; padding-left: 0; margin: 0;">
      @foreach ($errors->all() as $error)
        <li>• {{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


@if (session('success'))
  <div style="background-color: #d4edda; color: #155724; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
    {{ session('success') }}
  </div>
@endif



      <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Today's Mood</h2>

      
      <div style="margin-bottom: 20px;">
        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #444;">Select your mood:</label>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
          <label><input type="radio" name="mood" value="Happy" required /> Happy</label>
          <label><input type="radio" name="mood" value="Sad" /> Sad</label>
          <label><input type="radio" name="mood" value="Angry" /> Angry</label>
          <label><input type="radio" name="mood" value="Excited" /> Excited</label>
        </div>
      </div>


      <div style="margin-bottom: 20px;">
        <label for="note" style="display: block; margin-bottom: 8px; font-weight: 600; color: #444;">Optional note:</label>
        <textarea name="note" id="note" rows="3"
          placeholder="Write something here..."
          style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; resize: none; transition: border-color 0.3s ease-in-out;"
          onfocus="this.style.borderColor='#4a90e2'" onblur="this.style.borderColor='#ccc'"></textarea>
      </div>


      <div style="margin-bottom: 20px;">
        <button type="submit"
          onmouseover="this.style.backgroundColor='#357abd'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)'"
          onmouseout="this.style.backgroundColor='#4a90e2'; this.style.boxShadow='none'"
          style="width: 100%; background-color: #4a90e2; color: white; padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;">
          Submit Mood
        </button>
      </div>

    
      <div style="text-align: center;">
        <p style="color: #777; font-size: 14px;">Already submitted today?</p>
        <button type="button"
          onmouseover="this.style.backgroundColor='#d18800'"
          onmouseout="this.style.backgroundColor='#f39c12'"
          style="background-color: #f39c12; color: white; border: none; padding: 10px 20px; border-radius: 8px; margin-right: 10px; cursor: pointer; transition: background-color 0.3s ease;">
          Edit Entry
        </button>
        <button type="button"
          onmouseover="this.style.backgroundColor='#c0392b'"
          onmouseout="this.style.backgroundColor='#e74c3c'"
          style="background-color: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; transition: background-color 0.3s ease;">
          Delete Entry
        </button>
      </div>

    </form>
  </div>

  
  <style>
    @keyframes fadeIn {
      to { opacity: 1; }
    }


    @media (max-width: 767px) {
        .container {
            padding: 40px;
        }
    }

   
    
  </style>

</body>
</html>
