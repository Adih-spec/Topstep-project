<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Management System • Bootstrap 5</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{
      --sidebar-width: 280px;
    }
    body{ background: #f8fafc; }
    .sidebar{
      width: var(--sidebar-width);
    }
    @media (min-width: 992px){
      .sidebar{ position: sticky; top: 0; height: 100vh; }
      main{ margin-left: var(--sidebar-width); }
    }
    .table thead th{ white-space: nowrap; }
    .table-responsive{ max-height: 58vh; }
    .form-floating>.bi{ position:absolute; right:1rem; top:50%; transform:translateY(-50%); pointer-events:none; opacity:.5 }
    .cursor-pointer{ cursor: pointer; }
    .required::after{ content:" *"; color:#dc3545; }
    .kpi{ min-height: 110px; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top shadow-sm">
    <div class="container-fluid">
      <button class="btn btn-outline-secondary d-lg-none me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand fw-semibold" href="#"><i class="bi bi-mortarboard me-2 text-primary"></i>Student Manager</a>

      <div class="d-flex gap-2 ms-auto">
        <button id="btnExportCsv" class="btn btn-outline-primary"><i class="bi bi-download me-1"></i>Export CSV</button>
        <label class="btn btn-outline-secondary mb-0">
          <i class="bi bi-upload me-1"></i>Import CSV
          <input id="importCsvInput" type="file" accept=".csv" hidden>
        </label>
        <button id="btnPrint" class="btn btn-outline-secondary"><i class="bi bi-printer me-1"></i>Print</button>
        <button id="btnClearAll" class="btn btn-outline-danger"><i class="bi bi-trash3 me-1"></i>Clear All</button>
      </div>
    </div>
  </nav>

  <!-- Sidebar (offcanvas on mobile, sticky on desktop) -->
  <div class="offcanvas offcanvas-start sidebar border-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasSidebarLabel"><i class="bi bi-collection me-2"></i>Navigation</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item"><a class="nav-link active" href="#"><i class="bi bi-people-fill me-2"></i>Students</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="showToast('Coming soon: Classes')"><i class="bi bi-grid me-2"></i>Classes</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="showToast('Coming soon: Attendance')"><i class="bi bi-clipboard-check me-2"></i>Attendance</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="showToast('Coming soon: Fees')"><i class="bi bi-wallet2 me-2"></i>Fees</a></li>
      </ul>
      <div class="mt-auto small text-muted">
        <hr>
        <div>Version 1.0 • Bootstrap 5.3</div>
      </div>
    </div>
  </div>

  <!-- Main -->
  <main class="container-fluid px-3 px-lg-4 py-3">
    <!-- KPI Row -->
    <div class="row g-3 mb-3">
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card kpi shadow-sm">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted">Total Students</div>
              <div id="kpiTotal" class="display-6 fw-bold">0</div>
            </div>
            <i class="bi bi-people display-6 text-primary"></i>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card kpi shadow-sm">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted">Male</div>
              <div id="kpiMale" class="display-6 fw-bold">0</div>
            </div>
            <i class="bi bi-gender-male display-6 text-info"></i>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card kpi shadow-sm">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted">Female</div>
              <div id="kpiFemale" class="display-6 fw-bold">0</div>
            </div>
            <i class="bi bi-gender-female display-6 text-danger"></i>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-3">
        <div class="card kpi shadow-sm">
          <div class="card-body d-flex align-items-center justify-content-between">
            <div>
              <div class="text-muted">Avg. GPA</div>
              <div id="kpiGpa" class="display-6 fw-bold">0.00</div>
            </div>
            <i class="bi bi-bar-chart-line display-6 text-success"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <div class="row g-2 align-items-center">
          <div class="col-12 col-md-4">
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input id="searchInput" type="text" class="form-control" placeholder="Search name, email or phone...">
            </div>
          </div>
          <div class="col-6 col-md-3">
            <select id="filterClass" class="form-select">
              <option value="">All Classes</option>
              <option>JSS1</option>
              <option>JSS2</option>
              <option>JSS3</option>
              <option>SS1</option>
              <option>SS2</option>
              <option>SS3</option>
            </select>
          </div>
          <div class="col-6 col-md-3">
            <select id="filterGender" class="form-select">
              <option value="">All Genders</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-12 col-md-2 text-md-end">
            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#studentModal" onclick="openCreateForm()">
              <i class="bi bi-plus-lg me-1"></i>Add Student
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Card -->
    <div class="card shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-semibold"><i class="bi bi-table me-2"></i>Students</span>
        <div class="small text-muted" id="tableInfo">0 records</div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0" id="studentsTable">
            <thead class="table-light sticky-top" style="top:0; z-index:1;">
              <tr>
                <th class="text-center"><input class="form-check-input" type="checkbox" id="selectAll"></th>
                <th class="cursor-pointer" onclick="sortBy('id')">ID <i class="bi bi-arrow-down-up"></i></th>
                <th class="cursor-pointer" onclick="sortBy('name')">Name <i class="bi bi-arrow-down-up"></i></th>
                <th>Email</th>
                <th>Class</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Address</th>
                <th class="cursor-pointer" onclick="sortBy('gpa')">GPA <i class="bi bi-arrow-down-up"></i></th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="studentsTbody">
              <!-- Rows render here -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer d-flex flex-wrap gap-2 justify-content-between align-items-center">
        <div class="btn-group">
          <button class="btn btn-outline-secondary btn-sm" id="bulkDelete"><i class="bi bi-trash3 me-1"></i>Delete Selected</button>
          <button class="btn btn-outline-secondary btn-sm" id="bulkEmail"><i class="bi bi-envelope me-1"></i>Email Selected</button>
        </div>
        <nav>
          <ul class="pagination pagination-sm mb-0" id="pagination">
            <!-- Pagination render here -->
          </ul>
        </nav>
      </div>
    </div>
  </main>

  <!-- Add/Edit Modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModalLabel">Add Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="studentForm" novalidate>
          <div class="modal-body">
            <input type="hidden" id="studentId">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label required">Full Name</label>
                <input type="text" class="form-control" id="name" required>
                <div class="invalid-feedback">Name is required.</div>
              </div>
              <div class="col-md-6">
                <label class="form-label required">Email</label>
                <input type="email" class="form-control" id="email" required>
                <div class="invalid-feedback">Valid email is required.</div>
              </div>
              <div class="col-md-4">
                <label class="form-label required">Class</label>
                <select class="form-select" id="class" required>
                  <option value="">Choose...</option>
                  <option>JSS1</option>
                  <option>JSS2</option>
                  <option>JSS3</option>
                  <option>SS1</option>
                  <option>SS2</option>
                  <option>SS3</option>
                </select>
                <div class="invalid-feedback">Class is required.</div>
              </div>
              <div class="col-md-4">
                <label class="form-label required">Gender</label>
                <select class="form-select" id="gender" required>
                  <option value="">Choose...</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <div class="invalid-feedback">Gender is required.</div>
              </div>
              <div class="col-md-4">
                <label class="form-label required">Date of Birth</label>
                <input type="date" class="form-control" id="dob" required>
                <div class="invalid-feedback">DOB is required.</div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" placeholder="08012345678">
              </div>
              <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Street, City, State">
              </div>
              <div class="col-md-4">
                <label class="form-label">GPA</label>
                <input type="number" min="0" max="5" step="0.01" class="form-control" id="gpa" placeholder="0.00">
              </div>
              <div class="col-md-8">
                <label class="form-label">Notes</label>
                <textarea class="form-control" id="notes" rows="2" placeholder="Additional info..."></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Confirm Modal -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete <span id="deleteTargetName" class="fw-semibold"></span>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast Container -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
    <div id="liveToast" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="toastBody">Hello!</div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- App Logic -->
  <script>
    // ===== Utilities =====
    const $ = (sel, root=document) => root.querySelector(sel);
    const $$ = (sel, root=document) => Array.from(root.querySelectorAll(sel));

    function uid(){
      return Math.floor(Math.random()*1e9);
    }

    function formatDate(iso){
      if(!iso) return '';
      const d = new Date(iso);
      const y = d.getFullYear();
      const m = String(d.getMonth()+1).padStart(2,'0');
      const day = String(d.getDate()).padStart(2,'0');
      return `${y}-${m}-${day}`;
    }

    function showToast(msg){
      $('#toastBody').textContent = msg;
      const toast = bootstrap.Toast.getOrCreateInstance($('#liveToast'));
      toast.show();
    }

    function saveToStorage(){
      localStorage.setItem('students', JSON.stringify(state.students));
    }

    function loadFromStorage(){
      try{
        const v = JSON.parse(localStorage.getItem('students')||'[]');
        if(Array.isArray(v)) return v; else return [];
      }catch(e){ return []; }
    }

    // ===== State =====
    const state = {
      students: loadFromStorage(),
      page: 1,
      perPage: 8,
      sortKey: 'id',
      sortDir: 'asc',
      search: '',
      filterClass: '',
      filterGender: ''
    };

    // Seed demo data if empty
    if(state.students.length === 0){
      state.students = [
        {id: uid(), name: 'Amina Yusuf', email: 'amina.yusuf@example.com', class: 'SS2', gender: 'Female', dob: '2008-04-12', phone:'08030000001', address:'Abuja', gpa:4.60, notes:''},
        {id: uid(), name: 'Chinedu Okafor', email: 'chinedu.okafor@example.com', class: 'SS1', gender: 'Male', dob: '2009-08-23', phone:'08030000002', address:'Lagos', gpa:3.45, notes:''},
        {id: uid(), name: 'Zainab Bello', email: 'z.bello@example.com', class: 'JSS3', gender: 'Female', dob: '2010-01-15', phone:'08030000003', address:'Kano', gpa:4.90, notes:''},
        {id: uid(), name: 'Ibrahim Musa', email: 'ibrahim.musa@example.com', class: 'SS3', gender: 'Male', dob: '2007-11-05', phone:'08030000004', address:'Kaduna', gpa:2.85, notes:''},
        {id: uid(), name: 'Uche Eze', email: 'uche.eze@example.com', class: 'JSS2', gender: 'Male', dob: '2011-03-30', phone:'08030000005', address:'Enugu', gpa:3.95, notes:''},
        {id: uid(), name: 'Sarah Peters', email: 'sarah.peters@example.com', class: 'SS1', gender: 'Female', dob: '2009-12-19', phone:'08030000006', address:'Port Harcourt', gpa:4.10, notes:''},
        {id: uid(), name: 'Bola Ade', email: 'bola.ade@example.com', class: 'JSS1', gender: 'Female', dob: '2012-05-10', phone:'08030000007', address:'Ibadan', gpa:3.20, notes:''},
        {id: uid(), name: 'Tunde Akin', email: 'tunde.akin@example.com', class: 'SS2', gender: 'Male', dob: '2008-07-09', phone:'08030000008', address:'Lagos', gpa:2.60, notes:''},
        {id: uid(), name: 'Grace Udo', email: 'grace.udo@example.com', class: 'SS3', gender: 'Female', dob: '2007-02-02', phone:'08030000009', address:'Uyo', gpa:4.75, notes:''}
      ];
      saveToStorage();
    }

    // ===== Rendering =====
    function getFilteredSorted(){
      let rows = state.students.filter(s=>{
        const q = state.search.toLowerCase();
        const matchQ = !q || [s.name, s.email, s.phone].some(v=> (v||'').toLowerCase().includes(q));
        const matchClass = !state.filterClass || s.class === state.filterClass;
        const matchGender = !state.filterGender || s.gender === state.filterGender;
        return matchQ && matchClass && matchGender;
      });
      rows.sort((a,b)=>{
        const k = state.sortKey;
        let va = a[k]; let vb = b[k];
        if(k === 'name' || k==='email' || k==='class' || k==='gender' || k==='address'){
          va = (va||'').toLowerCase(); vb = (vb||'').toLowerCase();
        }
        if(va<vb) return state.sortDir==='asc'?-1:1;
        if(va>vb) return state.sortDir==='asc'?1:-1;
        return 0;
      });
      return rows;
    }

    function renderTable(){
      const rows = getFilteredSorted();
      const total = rows.length;

      const start = (state.page-1)*state.perPage;
      const end = start + state.perPage;
      const pageRows = rows.slice(start, end);

      const tbody = $('#studentsTbody');
      tbody.innerHTML = pageRows.map(s=>`
        <tr>
          <td class="text-center"><input class="form-check-input row-check" type="checkbox" data-id="${s.id}"></td>
          <td>${s.id}</td>
          <td class="fw-semibold">${s.name}</td>
          <td>${s.email||''}</td>
          <td><span class="badge text-bg-light border">${s.class||''}</span></td>
          <td>${s.gender||''}</td>
          <td>${formatDate(s.dob)||''}</td>
          <td>${s.phone||''}</td>
          <td>${s.address||''}</td>
          <td>${(s.gpa??0).toFixed(2)}</td>
          <td>
            <div class="btn-group btn-group-sm">
              <button class="btn btn-outline-secondary" title="View" onclick='viewStudent(${JSON.stringify(s.id)})'><i class="bi bi-eye"></i></button>
              <button class="btn btn-outline-primary" title="Edit" onclick='openEditForm(${JSON.stringify(s.id)})'><i class="bi bi-pencil"></i></button>
              <button class="btn btn-outline-danger" title="Delete" onclick='openDelete(${JSON.stringify(s.id)})'><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
      `).join('');

      $('#tableInfo').textContent = `${total} record${total!==1?'s':''}`;

      // Pagination
      const totalPages = Math.ceil(total/state.perPage)||1;
      state.page = Math.min(state.page, totalPages);
      const pag = $('#pagination');
      const items = [];
      function li(disabled, active, label, page){
        return `<li class="page-item ${disabled?'disabled':''} ${active?'active':''}">
          <a class="page-link" href="#" onclick="gotoPage(${page}); return false;">${label}</a></li>`;
      }
      items.push(li(state.page===1,false,'«',state.page-1||1));
      const windowSize = 5;
      let pStart = Math.max(1, state.page - Math.floor(windowSize/2));
      let pEnd = Math.min(totalPages, pStart + windowSize - 1);
      pStart = Math.max(1, pEnd - windowSize + 1);
      for(let p=pStart; p<=pEnd; p++) items.push(li(false, p===state.page, p, p));
      items.push(li(state.page===totalPages,false,'»',Math.min(totalPages, state.page+1)));
      pag.innerHTML = items.join('');

      // KPI
      const male = rows.filter(s=>s.gender==='Male').length;
      const female = rows.filter(s=>s.gender==='Female').length;
      const avgGpa = rows.length ? (rows.reduce((sum,s)=>sum+(Number(s.gpa)||0),0)/rows.length) : 0;
      $('#kpiTotal').textContent = rows.length;
      $('#kpiMale').textContent = male;
      $('#kpiFemale').textContent = female;
      $('#kpiGpa').textContent = avgGpa.toFixed(2);

      // Clear selectAll
      $('#selectAll').checked = false;
    }

    function gotoPage(p){
      const rows = getFilteredSorted();
      const totalPages = Math.ceil(rows.length/state.perPage)||1;
      state.page = Math.max(1, Math.min(totalPages, p));
      renderTable();
    }

    function sortBy(key){
      if(state.sortKey === key){
        state.sortDir = state.sortDir==='asc'?'desc':'asc';
      } else {
        state.sortKey = key; state.sortDir='asc';
      }
      renderTable();
    }

    // ===== Form handling =====
    function openCreateForm(){
      $('#studentModalLabel').textContent = 'Add Student';
      $('#studentForm').reset();
      $('#studentId').value='';
    }

    function openEditForm(id){
      const s = state.students.find(x=>x.id===id);
      if(!s) return;
      $('#studentModalLabel').textContent = 'Edit Student';
      $('#studentId').value = s.id;
      $('#name').value = s.name||'';
      $('#email').value = s.email||'';
      $('#class').value = s.class||'';
      $('#gender').value = s.gender||'';
      $('#dob').value = formatDate(s.dob)||'';
      $('#phone').value = s.phone||'';
      $('#address').value = s.address||'';
      $('#gpa').value = s.gpa ?? '';
      $('#notes').value = s.notes||'';
      const modal = new bootstrap.Modal($('#studentModal'));
      modal.show();
    }

    function viewStudent(id){
      const s = state.students.find(x=>x.id===id);
      if(!s) return;
      const info = `Name: ${s.name}\nEmail: ${s.email}\nClass: ${s.class}\nGender: ${s.gender}\nDOB: ${formatDate(s.dob)}\nPhone: ${s.phone}\nAddress: ${s.address}\nGPA: ${(s.gpa??0).toFixed(2)}\nNotes: ${s.notes||''}`;
      alert(info);
    }

    $('#studentForm').addEventListener('submit', (e)=>{
      e.preventDefault();
      const form = e.currentTarget;
      form.classList.add('was-validated');
      if(!form.checkValidity()) return;

      const payload = {
        id: Number($('#studentId').value) || uid(),
        name: $('#name').value.trim(),
        email: $('#email').value.trim(),
        class: $('#class').value,
        gender: $('#gender').value,
        dob: $('#dob').value,
        phone: $('#phone').value.trim(),
        address: $('#address').value.trim(),
        gpa: Number($('#gpa').value) || 0,
        notes: $('#notes').value.trim()
      };

      const index = state.students.findIndex(s=>s.id===payload.id);
      if(index>-1){
        state.students[index] = payload;
        showToast('Student updated');
      } else {
        state.students.unshift(payload);
        showToast('Student added');
      }
      saveToStorage();
      renderTable();
      bootstrap.Modal.getInstance($('#studentModal')).hide();
      form.classList.remove('was-validated');
      form.reset();
    });

    // ===== Delete =====
    let pendingDeleteId = null;
    function openDelete(id){
      const s = state.students.find(x=>x.id===id);
      if(!s) return;
      pendingDeleteId = id;
      $('#deleteTargetName').textContent = s.name;
      const modal = new bootstrap.Modal($('#confirmDeleteModal'));
      modal.show();
    }

    $('#confirmDeleteBtn').addEventListener('click', ()=>{
      if(pendingDeleteId==null) return;
      state.students = state.students.filter(s=>s.id!==pendingDeleteId);
      pendingDeleteId = null;
      saveToStorage();
      renderTable();
      bootstrap.Modal.getInstance($('#confirmDeleteModal')).hide();
      showToast('Student deleted');
    });

    // ===== Bulk actions =====
    $('#selectAll').addEventListener('change', (e)=>{
      $$('.row-check').forEach(cb=>cb.checked = e.target.checked);
    });

    $('#bulkDelete').addEventListener('click', ()=>{
      const ids = $$('.row-check:checked').map(cb=>Number(cb.dataset.id));
      if(ids.length===0) return showToast('No rows selected');
      if(!confirm(`Delete ${ids.length} selected student(s)?`)) return;
      state.students = state.students.filter(s=>!ids.includes(s.id));
      saveToStorage();
      renderTable();
      showToast('Selected students deleted');
    });

    $('#bulkEmail').addEventListener('click', ()=>{
      const emails = $$('.row-check:checked').map(cb=>{
        const s = state.students.find(x=>x.id===Number(cb.dataset.id));
        return s?.email;
      }).filter(Boolean);
      if(emails.length===0) return showToast('No rows selected');
      window.location.href = `mailto:${emails.join(',')}`;
    });

    // ===== Search & Filters =====
    $('#searchInput').addEventListener('input', (e)=>{ state.search = e.target.value; state.page=1; renderTable(); });
    $('#filterClass').addEventListener('change', (e)=>{ state.filterClass = e.target.value; state.page=1; renderTable(); });
    $('#filterGender').addEventListener('change', (e)=>{ state.filterGender = e.target.value; state.page=1; renderTable(); });

    // ===== Export/Import/Print/Clear =====
    function toCsv(rows){
      const headers = ['id','name','email','class','gender','dob','phone','address','gpa','notes'];
      const escape = (v)=>`"${String(v??'').replaceAll('"','""')}"`;
      const lines = [headers.join(',')];
      rows.forEach(r=>{
        lines.push(headers.map(h=>escape(r[h])).join(','));
      });
      return lines.join('\n');
    }

    function download(filename, text){
      const a = document.createElement('a');
      a.href = URL.createObjectURL(new Blob([text], {type:'text/csv'}));
      a.download = filename; a.click();
      URL.revokeObjectURL(a.href);
    }

    $('#btnExportCsv').addEventListener('click', ()=>{
      const csv = toCsv(getFilteredSorted());
      download('students.csv', csv);
    });

    $('#importCsvInput').addEventListener('change', (e)=>{
      const file = e.target.files?.[0];
      if(!file) return;
      const reader = new FileReader();
      reader.onload = () =>{
        const text = String(reader.result||'');
        const [headerLine, ...lines] = text.split(/\r?\n/).filter(Boolean);
        const headers = headerLine.split(',').map(h=>h.trim().replace(/^"|"$/g,''));
        const idx = (name)=> headers.indexOf(name);
        const imported = lines.map(line=>{
          const cols = line.match(/\"([^\"]|\"\")*\"|[^,]+/g)?.map(c=>c.replace(/^"|"$/g,'').replaceAll('""','"'))||[];
          return {
            id: Number(cols[idx('id')])||uid(),
            name: cols[idx('name')]||'',
            email: cols[idx('email')]||'',
            class: cols[idx('class')]||'',
            gender: cols[idx('gender')]||'',
            dob: cols[idx('dob')]||'',
            phone: cols[idx('phone')]||'',
            address: cols[idx('address')]||'',
            gpa: Number(cols[idx('gpa')])||0,
            notes: cols[idx('notes')]||''
          };
        });
        state.students = imported.concat(state.students);
        saveToStorage();
        renderTable();
        showToast('CSV imported');
        e.target.value = '';
      };
      reader.readAsText(file);
    });

    $('#btnPrint').addEventListener('click', ()=>{ window.print(); });

    $('#btnClearAll').addEventListener('click', ()=>{
      if(confirm('This will remove ALL students from local storage. Continue?')){
        state.students = [];
        saveToStorage();
        renderTable();
        showToast('All records cleared');
      }
    });

    // ===== Init =====
    document.addEventListener('DOMContentLoaded', ()=>{
      renderTable();
    });
  </script>
</body>
</html>
