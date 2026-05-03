<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages — SwiftBite Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --dark:   #0f1117;
            --dark-2: #1a1d27;
            --dark-3: #22263a;
            --green:  #3ecf8e;
            --green-d:#2aa870;
            --red:    #f87171;
            --white:  #ffffff;
            --radius: 10px;
        }
        body { font-family: 'Inter', sans-serif; background: var(--dark); color: rgba(255,255,255,.85); min-height: 100vh; }

        /* ── Topbar ── */
        .topbar {
            background: var(--dark-2);
            border-bottom: 1px solid rgba(255,255,255,.07);
            padding: 0 32px;
            height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
        }
        .topbar__left { display: flex; align-items: center; gap: 12px; }
        .topbar__brand { font-size: 1.2rem; font-weight: 800; color: var(--white); }
        .topbar__brand span { color: var(--green); }
        .topbar__badge {
            font-size: .68rem; font-weight: 700; letter-spacing: .8px;
            text-transform: uppercase; background: rgba(62,207,142,.12);
            color: var(--green); border: 1px solid rgba(62,207,142,.25);
            padding: 3px 10px; border-radius: 50px;
        }
        .topbar__right { display: flex; align-items: center; gap: 12px; }
        .topbar__link {
            font-size: .82rem; color: rgba(255,255,255,.4);
            text-decoration: none; transition: color .2s;
            display: flex; align-items: center; gap: 6px;
        }
        .topbar__link:hover { color: var(--green); }
        .btn-logout {
            padding: 8px 20px;
            background: rgba(248,113,113,.1);
            border: 1px solid rgba(248,113,113,.2);
            border-radius: var(--radius);
            color: var(--red); font-size: .82rem; font-weight: 600;
            font-family: inherit; cursor: pointer; transition: all .2s;
            text-decoration: none;
        }
        .btn-logout:hover { background: rgba(248,113,113,.2); }

        /* ── Main ── */
        .main { padding: 36px 32px; max-width: 1300px; margin: 0 auto; }

        /* ── Page title ── */
        .page-title { margin-bottom: 28px; }
        .page-title h1 { font-size: 1.4rem; font-weight: 800; color: var(--white); margin-bottom: 4px; }
        .page-title p { font-size: .85rem; color: rgba(255,255,255,.35); }

        /* ── Stats ── */
        .stats-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 32px; }
        .stat-card {
            background: var(--dark-2);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: var(--radius);
            padding: 22px 24px;
            display: flex; align-items: center; gap: 16px;
            transition: border-color .2s;
        }
        .stat-card:hover { border-color: rgba(62,207,142,.25); }
        .stat-card__icon {
            width: 46px; height: 46px; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; flex-shrink: 0;
        }
        .stat-card__icon.green { background: rgba(62,207,142,.12); }
        .stat-card__icon.blue  { background: rgba(96,165,250,.12); }
        .stat-card__icon.purple{ background: rgba(167,139,250,.12); }
        .stat-card__label { font-size: .72rem; font-weight: 600; color: rgba(255,255,255,.35); text-transform: uppercase; letter-spacing: .6px; margin-bottom: 5px; }
        .stat-card__value { font-size: 1.7rem; font-weight: 800; color: var(--white); line-height: 1; }
        .stat-card__value.green { color: var(--green); }

        /* ── Flash ── */
        .flash {
            padding: 13px 18px; border-radius: var(--radius);
            font-size: .88rem; margin-bottom: 20px;
            background: rgba(62,207,142,.08); border: 1px solid rgba(62,207,142,.2);
            color: var(--green); display: flex; align-items: center; gap: 8px;
        }

        /* ── Table card ── */
        .table-card {
            background: var(--dark-2);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: var(--radius);
            overflow: hidden;
        }
        .table-card__header {
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255,255,255,.06);
            display: flex; align-items: center; justify-content: space-between;
        }
        .table-card__header h2 { font-size: 1rem; font-weight: 700; color: var(--white); }
        .table-card__header p  { font-size: .78rem; color: rgba(255,255,255,.3); margin-top: 2px; }
        .total-badge {
            background: rgba(62,207,142,.1); color: var(--green);
            border: 1px solid rgba(62,207,142,.2);
            font-size: .75rem; font-weight: 700;
            padding: 4px 12px; border-radius: 50px;
        }

        table { width: 100%; border-collapse: collapse; }
        thead { background: rgba(255,255,255,.03); }
        th {
            padding: 12px 20px; text-align: left;
            font-size: .7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .7px;
            color: rgba(255,255,255,.3);
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        td {
            padding: 15px 20px; font-size: .875rem;
            border-bottom: 1px solid rgba(255,255,255,.04);
            vertical-align: middle; color: rgba(255,255,255,.7);
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255,255,255,.02); }

        .td-id { color: rgba(255,255,255,.25); font-size: .78rem; font-weight: 600; }
        .td-name { font-weight: 700; color: var(--white); }
        .td-email a { color: var(--green); font-size: .83rem; text-decoration: none; }
        .td-email a:hover { text-decoration: underline; }
        .td-msg {
            max-width: 260px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            color: rgba(255,255,255,.45); font-size: .84rem;
        }
        .td-date { color: rgba(255,255,255,.3); font-size: .78rem; white-space: nowrap; }
        .td-actions { display: flex; gap: 8px; align-items: center; }

        /* ── Buttons ── */
        .btn-view {
            padding: 6px 14px;
            background: rgba(62,207,142,.1);
            border: 1px solid rgba(62,207,142,.25);
            border-radius: 7px;
            color: var(--green); font-size: .78rem; font-weight: 600;
            font-family: inherit; cursor: pointer; transition: all .2s;
            white-space: nowrap;
        }
        .btn-view:hover { background: rgba(62,207,142,.2); border-color: var(--green); }
        .btn-delete {
            padding: 6px 14px;
            background: rgba(248,113,113,.08);
            border: 1px solid rgba(248,113,113,.2);
            border-radius: 7px;
            color: var(--red); font-size: .78rem; font-weight: 600;
            font-family: inherit; cursor: pointer; transition: all .2s;
        }
        .btn-delete:hover { background: rgba(248,113,113,.18); border-color: var(--red); }

        /* ── Empty state ── */
        .empty-state { text-align: center; padding: 64px 24px; }
        .empty-state__icon { font-size: 3rem; margin-bottom: 16px; display: block; }
        .empty-state__title { font-size: 1rem; font-weight: 600; color: rgba(255,255,255,.5); margin-bottom: 6px; }
        .empty-state__text { font-size: .85rem; color: rgba(255,255,255,.25); }

        /* ── Pagination ── */
        .pagination-wrap {
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,.05);
            display: flex; justify-content: flex-end;
        }
        .pagination-wrap nav span,
        .pagination-wrap nav a {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 34px; height: 34px;
            padding: 0 10px; margin: 0 2px;
            border-radius: 7px; font-size: .82rem;
            color: rgba(255,255,255,.4);
            border: 1px solid rgba(255,255,255,.08);
            text-decoration: none; transition: all .2s;
        }
        .pagination-wrap nav a:hover { background: rgba(255,255,255,.07); color: var(--white); }
        .pagination-wrap nav span[aria-current] {
            background: var(--green); color: var(--dark);
            border-color: var(--green); font-weight: 700;
        }

        /* ════════════════════════════
           MODAL
        ════════════════════════════ */
        .modal-overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,.7);
            backdrop-filter: blur(4px);
            z-index: 100;
            display: none;
            align-items: center; justify-content: center;
            padding: 24px;
        }
        .modal-overlay.open { display: flex; }
        .modal {
            background: var(--dark-2);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 16px;
            width: 100%; max-width: 520px;
            box-shadow: 0 32px 80px rgba(0,0,0,.5);
            animation: slideUp .2s ease;
        }
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }
        .modal__header {
            padding: 22px 24px 18px;
            border-bottom: 1px solid rgba(255,255,255,.07);
            display: flex; align-items: center; justify-content: space-between;
        }
        .modal__title { font-size: 1rem; font-weight: 700; color: var(--white); }
        .modal__id { font-size: .75rem; color: rgba(255,255,255,.3); margin-top: 2px; }
        .modal__close {
            width: 32px; height: 32px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px;
            color: rgba(255,255,255,.5); font-size: 1.1rem;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: all .2s; line-height: 1;
        }
        .modal__close:hover { background: rgba(255,255,255,.12); color: var(--white); }
        .modal__body { padding: 24px; }
        .modal__field { margin-bottom: 20px; }
        .modal__field:last-child { margin-bottom: 0; }
        .modal__label {
            font-size: .7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .7px; color: rgba(255,255,255,.35);
            margin-bottom: 7px; display: flex; align-items: center; gap: 6px;
        }
        .modal__value {
            font-size: .92rem; color: var(--white);
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 8px; padding: 11px 14px;
            line-height: 1.65;
            word-break: break-word;
        }
        .modal__value.green { color: var(--green); }
        .modal__footer {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,.07);
            display: flex; gap: 10px; justify-content: flex-end;
        }
        .btn-modal-close {
            padding: 9px 20px;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px;
            color: rgba(255,255,255,.5); font-size: .85rem; font-weight: 600;
            font-family: inherit; cursor: pointer; transition: all .2s;
        }
        .btn-modal-close:hover { background: rgba(255,255,255,.1); color: var(--white); }
        .btn-modal-delete {
            padding: 9px 20px;
            background: rgba(248,113,113,.1);
            border: 1px solid rgba(248,113,113,.25);
            border-radius: 8px;
            color: var(--red); font-size: .85rem; font-weight: 600;
            font-family: inherit; cursor: pointer; transition: all .2s;
        }
        .btn-modal-delete:hover { background: rgba(248,113,113,.2); }
    </style>
</head>
<body>

    {{-- Topbar --}}
    <div class="topbar">
        <div class="topbar__left">
            <span class="topbar__brand">Swift<span>Bite</span></span>
            <span class="topbar__badge">Admin Panel</span>
        </div>
        <div class="topbar__right">
            <a href="{{ route('home') }}" class="topbar__link">← View Website</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="main">

        {{-- Page Title --}}
        <div class="page-title">
            <h1>Dashboard</h1>
            <p>Manage all contact form submissions</p>
        </div>

        {{-- Stats --}}
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-card__icon green">📨</div>
                <div>
                    <p class="stat-card__label">Total Messages</p>
                    <p class="stat-card__value green">{{ $messages->total() }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card__icon blue">📄</div>
                <div>
                    <p class="stat-card__label">This Page</p>
                    <p class="stat-card__value">{{ $messages->count() }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card__icon purple">🕐</div>
                <div>
                    <p class="stat-card__label">Latest Message</p>
                    <p class="stat-card__value" style="font-size:1rem; padding-top:4px;">
                        {{ $messages->first() ? $messages->first()->created_at->diffForHumans() : '—' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Flash --}}
        @if(session('deleted'))
            <div class="flash">✓ {{ session('deleted') }}</div>
        @endif

        {{-- Table --}}
        <div class="table-card">
            <div class="table-card__header">
                <div>
                    <h2>Contact Messages</h2>
                    <p>All messages submitted through the contact form</p>
                </div>
                <span class="total-badge">{{ $messages->total() }} Total</span>
            </div>

            @if($messages->count())
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message Preview</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                    <tr>
                        <td class="td-id">{{ $msg->id }}</td>
                        <td class="td-name">{{ $msg->name }}</td>
                        <td class="td-email"><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                        <td class="td-msg">{{ $msg->message }}</td>
                        <td class="td-date">{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <div class="td-actions">
                                {{-- View Button --}}
                                <button class="btn-view"
                                    onclick="openModal(
                                        '{{ $msg->id }}',
                                        '{{ addslashes($msg->name) }}',
                                        '{{ addslashes($msg->email) }}',
                                        '{{ addslashes($msg->message) }}',
                                        '{{ $msg->created_at->format('d M Y, h:i A') }}',
                                        '{{ route('admin.messages.destroy', $msg->id) }}'
                                    )">
                                    👁 View
                                </button>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this message from {{ addslashes($msg->name) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">🗑 Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($messages->hasPages())
                <div class="pagination-wrap">{{ $messages->links() }}</div>
            @endif

            @else
            <div class="empty-state">
                <span class="empty-state__icon">📭</span>
                <p class="empty-state__title">No messages yet</p>
                <p class="empty-state__text">Messages will appear here once users submit the contact form.</p>
            </div>
            @endif
        </div>

    </div>

    {{-- ═══════════ MODAL ═══════════ --}}
    <div class="modal-overlay" id="msgModal" onclick="closeOnOverlay(event)">
        <div class="modal">
            <div class="modal__header">
                <div>
                    <p class="modal__title">Message Details</p>
                    <p class="modal__id" id="modal-id"></p>
                </div>
                <button class="modal__close" onclick="closeModal()">✕</button>
            </div>
            <div class="modal__body">
                <div class="modal__field">
                    <p class="modal__label">👤 Sender Name</p>
                    <p class="modal__value" id="modal-name"></p>
                </div>
                <div class="modal__field">
                    <p class="modal__label">✉️ Email Address</p>
                    <p class="modal__value green" id="modal-email"></p>
                </div>
                <div class="modal__field">
                    <p class="modal__label">💬 Message</p>
                    <p class="modal__value" id="modal-message" style="white-space: pre-wrap;"></p>
                </div>
                <div class="modal__field">
                    <p class="modal__label">🕐 Received At</p>
                    <p class="modal__value" id="modal-date"></p>
                </div>
            </div>
            <div class="modal__footer">
                <button class="btn-modal-close" onclick="closeModal()">Close</button>
                <form id="modal-delete-form" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-modal-delete">🗑 Delete Message</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id, name, email, message, date, deleteUrl) {
            document.getElementById('modal-id').textContent = 'Message #' + id;
            document.getElementById('modal-name').textContent    = name;
            document.getElementById('modal-email').textContent   = email;
            document.getElementById('modal-message').textContent = message;
            document.getElementById('modal-date').textContent    = date;
            document.getElementById('modal-delete-form').action  = deleteUrl;
            document.getElementById('msgModal').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('msgModal').classList.remove('open');
            document.body.style.overflow = '';
        }
        function closeOnOverlay(e) {
            if (e.target.id === 'msgModal') closeModal();
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>

</body>
</html>
