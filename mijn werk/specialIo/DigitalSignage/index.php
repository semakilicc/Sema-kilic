<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rotterdam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav role="navigation">
    <div id="menuToggle">

        <input type="checkbox" />

        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <?php include 'weather.php';?>
        </ul>
    </div>
</nav>
<div class="container">
    <img src="img/rotterdam-map.jpg" height="1794" width="1857"/>
    <button data-modal-target="#modalCentraal" class="btn metro" id="Centraal"></button>
    <div class="modal" id="modalCentraal">
        <div class="modal-header">
            <div class="title">Rotterdam Centraal</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://imgr.rgcdn.nl/c97ca98f8eaf4648817a944b808b842d/opener/centraal-station-Rotterdam-Foto-Rick-Huijzer.jpg?v=sMlxN7sR_AF80o_w8y4bbw2">
        </div>
    </div>
    <button data-modal-target="#modalEendrachtsplein" class="btn metro" id="Eendrachtsplein"></button>
    <div class="modal" id="modalEendrachtsplein">
        <div class="modal-header">
            <div class="title">Eendrachtsplein</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://i.pinimg.com/originals/2b/cc/16/2bcc16b6752dfd04db54173be68bf4ea.jpg" width="550">
        </div>
    </div>
    <button data-modal-target="#modalStadhuis" class="btn metro" id="Stadhuis"></button>
    <div class="modal" id="modalStadhuis">
        <div class="modal-header">
            <div class="title">Stadhuis</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://www.iaa-architecten.nl/img/833/B1280X0/Stadhuis+Rotterdam+Bernard+Vink_.jpg" width="550">
        </div>
    </div>
    <button data-modal-target="#modalDijkzigt" class="btn metro" id="Dijkzigt"></button>
    <div class="modal" id="modalDijkzigt">
        <div class="modal-header">
            <div class="title">Dijkzigt</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://static.wixstatic.com/media/71b3e2_3fd89a7ce5054b56be22eefce9c10cf0~mv2.jpg/v1/fill/w_640,h_480,al_c,q_80,usm_0.66_1.00_0.01/71b3e2_3fd89a7ce5054b56be22eefce9c10cf0~mv2.webp">
        </div>
    </div>
    <button data-modal-target="#modalBeurs1" class="btn metro" id="Beurs1"></button>
    <div class="modal" id="modalBeurs1">
        <div class="modal-header">
            <div class="title">Beurs</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://www.mustsee.today/wp-content/uploads/2018/10/Koopgoot-en-Lijnbaan-10-1620x1080.jpg" width="550">
        </div>
    </div>
    <button data-modal-target="#modalBeurs2" class="btn metro" id="Beurs2"></button>
    <div class="modal" id="modalBeurs2">
        <div class="modal-header">
            <div class="title">Beurs</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Rotterdam_Beurs.JPG" width="550">
        </div>
    </div>
    <button data-modal-target="#modalBlaak" class="btn metro" id="Blaak"></button>
    <div class="modal" id="modalBlaak">
        <div class="modal-header">
            <div class="title">Blaak</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://media.indebuurt.nl/rotterdam/2019/11/07023517/blaak-kubuswoningen-iris-van-den-broek.jpg" width="600">
        </div>
    </div>
    <button data-modal-target="#modalOostplein" class="btn metro" id="Oostplein"></button>
    <div class="modal" id="modalOostplein">
        <div class="modal-header">
            <div class="title">Oostplein</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://images0.persgroep.net/rcs/heKYDbU2fTBAfXFXs25GBOqC8bg/diocontent/152915503/_fitwidth/694/?appId=21791a8992982cd8da851550a453bd7f&quality=0.8" width="550">
        </div>
    </div>
    <button data-modal-target="#modalLeuvehaven" class="btn metro" id="Leuvehaven"></button>
    <div class="modal" id="modalLeuvehaven">
        <div class="modal-header">
            <div class="title">Leuvehaven</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://media.indebuurt.nl/rotterdam/2020/03/07012538/leuvepaviljoen.jpg" width="600">
        </div>
    </div>
    <button data-modal-target="#modalWilhelminaplein" class="btn metro" id="Wilhelminaplein"></button>
    <div class="modal" id="modalWilhelminaplein">
        <div class="modal-header">
            <div class="title">Wilhelminaplein</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://cloud.funda.nl/valentina_media/127/622/402_1440x960.jpg" width="600">
        </div>
    </div>
    <button data-modal-target="#modalRijnhaven" class="btn metro" id="Rijnhaven"></button>
    <div class="modal" id="modalRijnhaven">
        <div class="modal-header">
            <div class="title">Rijnhaven</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <img src="https://www.rotterdam.nl/_internal/cimg!0/j19vkqxj6lf1j41auk9sz14cszprmv2" width="550">
        </div>
    </div>

    <div id="overlay"></div>
</div>
</body>
<script>
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
    const closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal)
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal)
        })
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal)
        })
    })

    function openModal(modal) {
        if (modal == null) return
        modal.classList.add('active')
        overlay.classList.add('active')
    }

    function closeModal(modal) {
        if (modal == null) return
        modal.classList.remove('active')
        overlay.classList.remove('active')
    }
</script>
</html>