<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Mood Entries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .container {
            padding: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            min-width: 800px; 
        }

        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 12px;
            color: #fff;
            font-weight: bold;
            font-size: 0.9em;
        }

        .Happy { background-color: #22c55e; }
        .Sad { background-color: #3b82f6; }
        .Angry { background-color: #ef4444; }
        .Excited { background-color: #f59e0b; }

        .actions a,
        .actions form button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 6px;
            font-size: 0.9em;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #eab308;
            color: white;
        }

        .delete-btn {
            background-color: #ef4444;
            color: white;
        }

        .delete-btn:hover,
        .edit-btn:hover {
            opacity: 0.9;
        }

        
        td:nth-child(4) {
            word-break: break-word;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 1.5em;
            }

            table {
                font-size: 0.9em;
            }

            th, td {
                padding: 10px 12px;
            }

            .actions a,
            .actions form button {
                margin-bottom: 4px;
                display: block;
                
                text-align: center;
            }
        }
    </style>
</head>
<body>

@include('components.navbar')

<div class="container">
    <h1>Your Mood Entries</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Username</th>
                    <th>Mood</th>
                    <th>Note</th>
                    <th>Entry Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($moodData as $mood)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mood->user->name }}</td>
                        <td><span class="badge {{ $mood->mood }}">{{ $mood->mood }}</span></td>
                        <td>{{ $mood->note }}</td>
                        <td>{{ \Carbon\Carbon::parse($mood->entry_date)->format('M d, Y') }}</td>

                        
                        <td class="actions">
                        @if(Auth::id() === $mood->user_id)
        <a href="{{ route('edit', $mood->id) }}" class="edit-btn">Edit</a>
        <form method="POST" action="{{ route('destroy', $mood) }}" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-delete" onclick="return confirm('Delete?')">Delete</button>
                                </form>
        
    @else
        <span style="color: gray; font-size: 0.85em;">Not allowed</span>
    @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td style="text-align: center;" colspan="6">No mood entries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



<div style="padding: 20px; overflow-x: auto;" class="card">
        <h2 class="section-title">Deleted Moods (Trash)</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th><th>Username</th><th>Mood</th><th>Note</th><th>Deleted At</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trashed as $i => $moodData )
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $moodData->user->name }}</td>
                        <td>{{ $moodData->mood }}</td>
                        <td>{{ $moodData->note }}</td>
                        <td>{{ $moodData->deleted_at }}</td>
                        <td>
                            @if(Auth::id() === $moodData->user_id)
                                <form method="POST" action="{{ route('restore', $moodData->id) }}" style="display:inline">
                                    @csrf
                                    <button style="padding: 10px;" class="btn btn-restore">Restore</button>
                                </form>
                                <form method="POST" action="{{ route('forceDelete', $moodData->id) }}" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button style="padding: 10px;" class="btn btn-force" onclick="return confirm('Permanently delete?')">Delete Permanently</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr ><td style="text-align: center;" colspan="6">Trash is empty.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>


</body>
</html>
