<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mood</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        h1 {
            text-align: center;
            color: #1f2937;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #374151;
        }

        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 1rem;
            background-color: #f9fafb;
            transition: border 0.3s ease;
        }

        select:focus,
        textarea:focus {
            border-color: #2563eb;
            outline: none;
        }

        button {
            width: 100%;
            background-color: #2563eb;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        @media screen and (max-width: 600px) {
            .container {
                margin: 40px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Mood</h1>

        <form method="POST" action="{{ route('update', $mood->id) }}">
            @csrf
            @method('PUT')

            <label for="mood">Mood</label>
            <select name="mood" required>
                <option value="Happy" {{ $mood->mood == 'Happy' ? 'selected' : '' }}>Happy</option>
                <option value="Sad" {{ $mood->mood == 'Sad' ? 'selected' : '' }}>Sad</option>
                <option value="Angry" {{ $mood->mood == 'Angry' ? 'selected' : '' }}>Angry</option>
                <option value="Excited" {{ $mood->mood == 'Excited' ? 'selected' : '' }}>Excited</option>
            </select>

            <label for="note">Note</label>
            <textarea name="note" rows="5" placeholder="Write your thoughts...">{{ $mood->note }}</textarea>

            <button type="submit">Update Mood</button>
        </form>
    </div>

</body>
</html>
