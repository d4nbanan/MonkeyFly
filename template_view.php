<?php $user=Model::get_user_info();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceMonkey</title>

    <link rel="stylesheet" href="./img/game/monkey.svg">


    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;900&family=Poppins:wght@900&display=swap"
        rel="stylesheet">

    <!-- SIMPLEBAR -->
    <link rel="stylesheet" href="./css/libs/simplebar/simplebar.css">

    <!-- STYLE -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
</head>

<body>
    <style type="text/css">.preloader div{margin: 21% auto;} .preloader{position: fixed;background: #180d28;width: 100%;height: 100%;text-align: center;vertical-align: middle;z-index: 999;}</style>
    <div class="preloader">
        <div>
            <img src="./img/game/monkey-head.svg" alt="" class="monkey-head">
        </div>
    </div>
    <!-- HEADER -->
    <header class="header">
        <div class="container">
            <div class="header__content">
                <a href="/" class="header__logo">
                    Space<span>Monkey</span>
                </a>
                <ul class="header__buttons">
                    <li class="header__buttons__item">
                        <a onclick="toggleFullScreen()" class="header__button" style="cursor: pointer;">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 8C21.2652 8 21.5196 7.89464 21.7071 7.70711C21.8946 7.51957 22 7.26522 22 7V3C21.9984 2.86932 21.9712 2.74022 21.92 2.62C21.8185 2.37565 21.6243 2.18147 21.38 2.08C21.2598 2.02876 21.1307 2.00158 21 2H17C16.7348 2 16.4804 2.10536 16.2929 2.29289C16.1054 2.48043 16 2.73478 16 3C16 3.26522 16.1054 3.51957 16.2929 3.70711C16.4804 3.89464 16.7348 4 17 4H18.59L12 10.59L5.41 4H7C7.26522 4 7.51957 3.89464 7.70711 3.70711C7.89464 3.51957 8 3.26522 8 3C8 2.73478 7.89464 2.48043 7.70711 2.29289C7.51957 2.10536 7.26522 2 7 2H3C2.86932 2.00158 2.74022 2.02876 2.62 2.08C2.37565 2.18147 2.18147 2.37565 2.08 2.62C2.02876 2.74022 2.00158 2.86932 2 3V7C2 7.26522 2.10536 7.51957 2.29289 7.70711C2.48043 7.89464 2.73478 8 3 8C3.26522 8 3.51957 7.89464 3.70711 7.70711C3.89464 7.51957 4 7.26522 4 7V5.41L10.59 12L4 18.59V17C4 16.7348 3.89464 16.4804 3.70711 16.2929C3.51957 16.1054 3.26522 16 3 16C2.73478 16 2.48043 16.1054 2.29289 16.2929C2.10536 16.4804 2 16.7348 2 17V21C2.00158 21.1307 2.02876 21.2598 2.08 21.38C2.18147 21.6243 2.37565 21.8185 2.62 21.92C2.74022 21.9712 2.86932 21.9984 3 22H7C7.26522 22 7.51957 21.8946 7.70711 21.7071C7.89464 21.5196 8 21.2652 8 21C8 20.7348 7.89464 20.4804 7.70711 20.2929C7.51957 20.1054 7.26522 20 7 20H5.41L12 13.41L18.59 20H17C16.7348 20 16.4804 20.1054 16.2929 20.2929C16.1054 20.4804 16 20.7348 16 21C16 21.2652 16.1054 21.5196 16.2929 21.7071C16.4804 21.8946 16.7348 22 17 22H21C21.1307 21.9984 21.2598 21.9712 21.38 21.92C21.6243 21.8185 21.8185 21.6243 21.92 21.38C21.9712 21.2598 21.9984 21.1307 22 21V17C22 16.7348 21.8946 16.4804 21.7071 16.2929C21.5196 16.1054 21.2652 16 21 16C20.7348 16 20.4804 16.1054 20.2929 16.2929C20.1054 16.4804 20 16.7348 20 17V18.59L13.41 12L20 5.41V7C20 7.26522 20.1054 7.51957 20.2929 7.70711C20.4804 7.89464 20.7348 8 21 8Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>  
<?php
    if(isset($_SESSION['user'])){
?>
                    <li class="header__buttons__item">
                        <a href="#" class="header__button header__button__balance">
                            <div class="balance_controller_arrow balance_controller_arrow1"></div>
                            <div class="balance_controller balance_controller_arrow1">
                                <div class="balance_controller_balance my_balance"><?=round($user->balance, 2);?>$</div>
                                <div class="balance_controller_replenish">Пополнение баланса</div>
                                <div class="balance_controller_withdraw">Вывод баланса</div>
                            </div>
                            <img src="/img/wallet.svg" alt="">
                            <div class="balance my_balance"><?=round($user->balance,2);?>$</div>
                            <div>$</div>
                        </a>
                    </li>
<?}?>
                    <!--li class="header__buttons__item">
                        <a soundonoff="1" class="header__button onsounds">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.43 4.08221C12.2676 4.01195 12.0895 3.98604 11.9138 4.00712C11.7381 4.02821 11.5712 4.09552 11.43 4.20221L6.65 7.98221H3C2.73478 7.98221 2.48043 8.08757 2.29289 8.2751C2.10536 8.46264 2 8.71699 2 8.98221V14.9822C2 15.2474 2.10536 15.5018 2.29289 15.6893C2.48043 15.8769 2.73478 15.9822 3 15.9822H6.65L11.38 19.7622C11.5559 19.9034 11.7744 19.9809 12 19.9822C12.1494 19.9847 12.297 19.9503 12.43 19.8822C12.6002 19.8012 12.744 19.6737 12.8448 19.5144C12.9457 19.3552 12.9995 19.1707 13 18.9822V4.98221C12.9995 4.79372 12.9457 4.60923 12.8448 4.44999C12.744 4.29075 12.6002 4.16326 12.43 4.08221ZM11 16.9022L7.62 14.2022C7.44406 14.061 7.22556 13.9835 7 13.9822H4V9.98221H7C7.22556 9.9809 7.44406 9.90337 7.62 9.76221L11 7.06221V16.9022ZM19.66 6.32221C19.4717 6.13391 19.2163 6.02812 18.95 6.02812C18.6837 6.02812 18.4283 6.13391 18.24 6.32221C18.0517 6.51051 17.9459 6.76591 17.9459 7.03221C17.9459 7.29851 18.0517 7.55391 18.24 7.74221C18.8289 8.33015 19.289 9.03414 19.5911 9.80946C19.8933 10.5848 20.0309 11.4145 19.9951 12.2458C19.9594 13.0772 19.7511 13.892 19.3835 14.6385C19.016 15.3851 18.4971 16.047 17.86 16.5822C17.7053 16.7145 17.5946 16.8909 17.5428 17.0878C17.491 17.2847 17.5005 17.4927 17.5701 17.684C17.6396 17.8753 17.766 18.0409 17.9321 18.1585C18.0983 18.2761 18.2964 18.3402 18.5 18.3422C18.7337 18.3427 18.9601 18.2613 19.14 18.1122C19.9909 17.3995 20.6843 16.5175 21.1759 15.5223C21.6675 14.5272 21.9466 13.4406 21.9955 12.3317C22.0444 11.2228 21.862 10.1158 21.4599 9.08125C21.0579 8.04666 20.4449 7.10706 19.66 6.32221ZM16.83 9.15221C16.7368 9.05897 16.6261 8.98501 16.5042 8.93455C16.3824 8.88409 16.2519 8.85812 16.12 8.85812C15.9881 8.85812 15.8576 8.88409 15.7358 8.93455C15.6139 8.98501 15.5032 9.05897 15.41 9.15221C15.3168 9.24545 15.2428 9.35614 15.1923 9.47796C15.1419 9.59978 15.1159 9.73035 15.1159 9.86221C15.1159 9.99407 15.1419 10.1246 15.1923 10.2465C15.2428 10.3683 15.3168 10.479 15.41 10.5722C15.7856 10.9456 15.9978 11.4526 16 11.9822C16.0002 12.2736 15.9368 12.5614 15.8142 12.8257C15.6915 13.09 15.5126 13.3243 15.29 13.5122C15.1887 13.5962 15.105 13.6993 15.0437 13.8156C14.9823 13.932 14.9445 14.0593 14.9325 14.1902C14.9204 14.3212 14.9343 14.4533 14.9733 14.5789C15.0124 14.7045 15.0758 14.8212 15.16 14.9222C15.2447 15.0227 15.3483 15.1056 15.465 15.166C15.5817 15.2265 15.7092 15.2633 15.8401 15.2745C15.9711 15.2856 16.1029 15.2709 16.2282 15.231C16.3534 15.1911 16.4696 15.127 16.57 15.0422C17.0171 14.6673 17.3768 14.1992 17.6238 13.6706C17.8709 13.1419 17.9992 12.5657 18 11.9822C17.9944 10.9223 17.5744 9.90666 16.83 9.15221Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li-->
                    <li class="header__buttons__item">
                        <a href="#how-to-play" class="header__button popuper">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.29 15.29C11.247 15.3375 11.2069 15.3876 11.17 15.44C11.1322 15.4957 11.1019 15.5563 11.08 15.62C11.0512 15.6767 11.031 15.7374 11.02 15.8C11.0151 15.8666 11.0151 15.9334 11.02 16C11.0166 16.1312 11.044 16.2613 11.1 16.38C11.1449 16.5041 11.2166 16.6168 11.3099 16.7101C11.4032 16.8034 11.5159 16.8751 11.64 16.92C11.7597 16.9729 11.8891 17.0002 12.02 17.0002C12.1509 17.0002 12.2803 16.9729 12.4 16.92C12.5241 16.8751 12.6368 16.8034 12.7301 16.7101C12.8234 16.6168 12.8951 16.5041 12.94 16.38C12.9844 16.2584 13.0048 16.1294 13 16C13.0008 15.8684 12.9755 15.7379 12.9258 15.6161C12.876 15.4943 12.8027 15.3834 12.71 15.29C12.617 15.1963 12.5064 15.1219 12.3846 15.0711C12.2627 15.0203 12.132 14.9942 12 14.9942C11.868 14.9942 11.7373 15.0203 11.6154 15.0711C11.4936 15.1219 11.383 15.1963 11.29 15.29ZM12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM12 20C10.4178 20 8.87104 19.5308 7.55544 18.6518C6.23985 17.7727 5.21447 16.5233 4.60897 15.0615C4.00347 13.5997 3.84504 11.9911 4.15372 10.4393C4.4624 8.88743 5.22433 7.46197 6.34315 6.34315C7.46197 5.22433 8.88743 4.4624 10.4393 4.15372C11.9911 3.84504 13.5997 4.00346 15.0615 4.60896C16.5233 5.21447 17.7727 6.23984 18.6518 7.55544C19.5308 8.87103 20 10.4177 20 12C20 14.1217 19.1572 16.1566 17.6569 17.6569C16.1566 19.1571 14.1217 20 12 20ZM12 7C11.4731 6.99966 10.9553 7.13812 10.4989 7.40144C10.0425 7.66476 9.66347 8.04366 9.4 8.5C9.32765 8.61382 9.27907 8.7411 9.25718 8.87418C9.23529 9.00726 9.24055 9.14339 9.27263 9.27439C9.30472 9.40538 9.36297 9.52854 9.44389 9.63643C9.52481 9.74433 9.62671 9.83475 9.74348 9.90224C9.86024 9.96974 9.98945 10.0129 10.1233 10.0292C10.2572 10.0454 10.393 10.0345 10.5225 9.99688C10.6521 9.9593 10.7727 9.89591 10.8771 9.81052C10.9814 9.72513 11.0675 9.6195 11.13 9.5C11.2181 9.3474 11.345 9.22078 11.4978 9.13298C11.6505 9.04518 11.8238 8.9993 12 9C12.2652 9 12.5196 9.10536 12.7071 9.29289C12.8946 9.48043 13 9.73478 13 10C13 10.2652 12.8946 10.5196 12.7071 10.7071C12.5196 10.8946 12.2652 11 12 11C11.7348 11 11.4804 11.1054 11.2929 11.2929C11.1054 11.4804 11 11.7348 11 12V13C11 13.2652 11.1054 13.5196 11.2929 13.7071C11.4804 13.8946 11.7348 14 12 14C12.2652 14 12.5196 13.8946 12.7071 13.7071C12.8946 13.5196 13 13.2652 13 13V12.82C13.6614 12.58 14.2174 12.1152 14.5708 11.5069C14.9242 10.8985 15.0525 10.1853 14.9334 9.49189C14.8143 8.79849 14.4552 8.16902 13.919 7.71352C13.3828 7.25801 12.7035 7.00546 12 7Z"
                                    fill="white" />
                            </svg>
                            <span class="how-play">
                                Как играть?
                            </span>
                        </a>
                    </li>        
       <?php
          if(!isset($_SESSION['user'])) {
        ?>
                      <li class="header__buttons__item" id="menu-btn" style="display:none!important">
            <?
                }else{
            ?>

                      <li class="header__buttons__item" id="menu-btn">
            <?
                }
            ?>
                        <a class="header__button mobile-header-menu">
                            <img src="/img/menu.svg" alt="">
                        </a>
                        <div class="menu-item">
                            <div class="name">
                                <div class="avatar">
                                    <img src="/img/avatar.png" alt="">
                                </div>
                                <span><?=$user->login;?></span>
                            </div>
                            <div class="btns">
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/sound.svg" alt="">
                                        </div>
                                        Звуки
                                    </span>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </a>
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/music.svg" alt="">
                                        </div>
                                        Музыка
                                    </span>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </a>
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/animation.svg" alt="">
                                        </div>
                                        Анимация
                                    </span>
                                    <label id="animation_controller" class="switch mactive">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </a>
                            </div>
                            <div class="btns">
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/provably.svg" alt="">
                                        </div>
                                        PROVABLY FAIR настройки
                                    </span>

                                </a>
                                <a href="#rules" class="popuper">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/rules.svg" alt="">
                                        </div>
                                        Правила игры
                                    </span>

                                </a>
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/history.svg" alt="">
                                        </div>
                                        История ставок
                                    </span>

                                </a>
                                <a href="#">
                                    <span class="name-btn">
                                        <div class="icon">
                                            <img src="/img/limit.svg" alt="">
                                        </div>
                                        Лимиты игры
                                    </span>

                                </a>
                            </div>
                        </div>
                    </li>

                        <?php
          if(!isset($_SESSION['user'])){
        ?>
                    <li class="header__buttons__item">
                        <a href="#signup" class="header__button popuper">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.71 12.71C16.6904 11.9387 17.406 10.8809 17.7572 9.68394C18.1085 8.48697 18.0779 7.21027 17.6698 6.03147C17.2617 4.85267 16.4963 3.83039 15.4801 3.10686C14.4639 2.38332 13.2474 1.99451 12 1.99451C10.7525 1.99451 9.53611 2.38332 8.51993 3.10686C7.50374 3.83039 6.73834 4.85267 6.33021 6.03147C5.92208 7.21027 5.89151 8.48697 6.24276 9.68394C6.59401 10.8809 7.3096 11.9387 8.29 12.71C6.61007 13.383 5.14428 14.4994 4.04889 15.9399C2.95349 17.3805 2.26956 19.0913 2.07 20.89C2.05555 21.0213 2.06711 21.1542 2.10402 21.2811C2.14093 21.4079 2.20246 21.5263 2.28511 21.6293C2.45202 21.8375 2.69478 21.9708 2.96 22C3.22521 22.0292 3.49116 21.9518 3.69932 21.7849C3.90749 21.618 4.04082 21.3752 4.07 21.11C4.28958 19.1552 5.22168 17.3498 6.68822 16.0388C8.15475 14.7278 10.0529 14.003 12.02 14.003C13.9871 14.003 15.8852 14.7278 17.3518 16.0388C18.8183 17.3498 19.7504 19.1552 19.97 21.11C19.9972 21.3557 20.1144 21.5827 20.2991 21.747C20.4838 21.9114 20.7228 22.0015 20.97 22H21.08C21.3421 21.9698 21.5817 21.8373 21.7466 21.6313C21.9114 21.4252 21.9881 21.1624 21.96 20.9C21.7595 19.0962 21.0719 17.381 19.9708 15.9382C18.8698 14.4954 17.3969 13.3795 15.71 12.71V12.71ZM12 12C11.2089 12 10.4355 11.7654 9.77772 11.3259C9.11992 10.8864 8.60723 10.2616 8.30448 9.53074C8.00173 8.79983 7.92251 7.99557 8.07686 7.21964C8.2312 6.44372 8.61216 5.73099 9.17157 5.17158C9.73098 4.61217 10.4437 4.2312 11.2196 4.07686C11.9956 3.92252 12.7998 4.00173 13.5307 4.30448C14.2616 4.60724 14.8863 5.11993 15.3259 5.77772C15.7654 6.43552 16 7.20888 16 8C16 9.06087 15.5786 10.0783 14.8284 10.8284C14.0783 11.5786 13.0609 12 12 12Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <?
                }
                ?>
                </ul>
            </div>
        </div>
    </header>

    <!-- PAGE -->
    <main class="page">
        <audio id="game_time" src="/audio/rocket.mp3"></audio>
        <audio id="audio_win" src="/audio/win.wav"></audio>
        <audio id="audio_lose" src="/audio/lose.wav"></audio>
        <div class="container">
            <div class="page__content">
                <!-- SIDEBAR -->
                <aside class="sidebar">
                    <ul class="tabs">
                        <li class="tabs__item">
                            <a href="#all-bets" class="tabs__link active">
                                Все
                            </a>
                        </li>
                        <li class="tabs__item">
                            <a href="#top-bets" class="tabs__link">
                                ТОП-10
                            </a>
                        </li>
                        <li class="tabs__item">
                            <a href="#my-bets" class="tabs__link">
                                Мои
                            </a>
                        </li>
                    </ul>
                    <div class="bets-count">
                        Всего ставок:
                        <span class="bets-lent">
                            0
                        </span>
                    </div>
                    <ul class="tab-list">
                        <li class="tab-list__item active" id="all-bets" data-simplebar>
                            <ul class="bets-list user_bid_content">

                            </ul>
                        </li>
                        <li class="tab-list__item " id="top-bets" data-simplebar>
                            <ul class="bets-list top_bid_content">
                                
                            </ul>
                        </li>
                        <li class="tab-list__item " id="my-bets" data-simplebar>
                            <ul class="bets-list my_bid_content">
                                
                            </ul>
                        </li>
                </aside>
                <div class="game">
                    <div class="game__history">
                        <div class="game__history__top">
                            <div class="game__history__button btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.25 2.25C10.2722 2.25 8.33879 2.83649 6.6943 3.9353C5.04981 5.03412 3.76809 6.5959 3.01121 8.42316C2.25433 10.2504 2.0563 12.2611 2.44215 14.2009C2.828 16.1407 3.78041 17.9225 5.17894 19.3211C6.57746 20.7196 8.35929 21.672 10.2991 22.0579C12.2389 22.4437 14.2496 22.2457 16.0768 21.4888C17.9041 20.7319 19.4659 19.4502 20.5647 17.8057C21.6635 16.1612 22.25 14.2278 22.25 12.25C22.25 10.9368 21.9913 9.63642 21.4888 8.42316C20.9863 7.20991 20.2497 6.10752 19.3211 5.17893C18.3925 4.25035 17.2901 3.51375 16.0768 3.0112C14.8636 2.50866 13.5632 2.25 12.25 2.25ZM12.25 20.25C10.6678 20.25 9.12104 19.7808 7.80544 18.9018C6.48985 18.0227 5.46447 16.7733 4.85897 15.3115C4.25347 13.8497 4.09504 12.2411 4.40372 10.6893C4.7124 9.13743 5.47433 7.71197 6.59315 6.59315C7.71197 5.47433 9.13743 4.7124 10.6893 4.40372C12.2411 4.09504 13.8497 4.25346 15.3115 4.85896C16.7733 5.46446 18.0227 6.48984 18.9018 7.80544C19.7808 9.12103 20.25 10.6677 20.25 12.25C20.25 14.3717 19.4072 16.4066 17.9069 17.9069C16.4066 19.4071 14.3717 20.25 12.25 20.25ZM15.35 12.88L13.25 11.67V7.25C13.25 6.98478 13.1446 6.73043 12.9571 6.54289C12.7696 6.35536 12.5152 6.25 12.25 6.25C11.9848 6.25 11.7304 6.35536 11.5429 6.54289C11.3554 6.73043 11.25 6.98478 11.25 7.25V12.25C11.25 12.25 11.25 12.33 11.25 12.37C11.2559 12.4389 11.2728 12.5064 11.3 12.57C11.3206 12.6293 11.3474 12.6863 11.38 12.74C11.4074 12.7968 11.4409 12.8505 11.48 12.9L11.64 13.03L11.73 13.12L14.33 14.62C14.4824 14.7064 14.6548 14.7512 14.83 14.75C15.0514 14.7515 15.2671 14.6796 15.4432 14.5453C15.6193 14.4111 15.7459 14.2222 15.8031 14.0083C15.8603 13.7944 15.8448 13.5676 15.7592 13.3634C15.6736 13.1592 15.5226 12.9892 15.33 12.88H15.35Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <ul class="game__history__list">
                                <?
                                    foreach (Model::get_last_coef(10) as $key => $value) {
                                ?>
                                    <li>
                                        <div class="coef <?if(($value>2)&&($value<10)){echo "coef_purple";}elseif($value>=10){echo "coef_toxic";}else{echo "coef_blue";}?>">
                                            <? if($value>=2){echo "<ul class='bublus'><li></li><li></li><li></li><li></li><li></li><li></li></ul>";} ?>
                                            x<?=bcdiv($value, 1,2);?>
                                        </div>
                                    </li>                                       
                                <?
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="game__history__all">
                            <div class="game__history__all__title">
                                <h4>
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 2C9.02219 2 7.08879 2.58649 5.4443 3.6853C3.79981 4.78412 2.51809 6.3459 1.76121 8.17316C1.00433 10.0004 0.806299 12.0111 1.19215 13.9509C1.578 15.8907 2.53041 17.6725 3.92894 19.0711C5.32746 20.4696 7.10929 21.422 9.0491 21.8079C10.9889 22.1937 12.9996 21.9957 14.8268 21.2388C16.6541 20.4819 18.2159 19.2002 19.3147 17.5557C20.4135 15.9112 21 13.9778 21 12C21 10.6868 20.7413 9.38642 20.2388 8.17316C19.7363 6.95991 18.9997 5.85752 18.0711 4.92893C17.1425 4.00035 16.0401 3.26375 14.8268 2.7612C13.6136 2.25866 12.3132 2 11 2ZM11 20C9.41775 20 7.87104 19.5308 6.55544 18.6518C5.23985 17.7727 4.21447 16.5233 3.60897 15.0615C3.00347 13.5997 2.84504 11.9911 3.15372 10.4393C3.4624 8.88743 4.22433 7.46197 5.34315 6.34315C6.46197 5.22433 7.88743 4.4624 9.43928 4.15372C10.9911 3.84504 12.5997 4.00346 14.0615 4.60896C15.5233 5.21446 16.7727 6.23984 17.6518 7.55544C18.5308 8.87103 19 10.4177 19 12C19 14.1217 18.1572 16.1566 16.6569 17.6569C15.1566 19.1571 13.1217 20 11 20ZM14.1 12.63L12 11.42V7C12 6.73478 11.8946 6.48043 11.7071 6.29289C11.5196 6.10536 11.2652 6 11 6C10.7348 6 10.4804 6.10536 10.2929 6.29289C10.1054 6.48043 10 6.73478 10 7V12C10 12 10 12.08 10 12.12C10.0059 12.1889 10.0228 12.2564 10.05 12.32C10.0706 12.3793 10.0974 12.4363 10.13 12.49C10.1574 12.5468 10.1909 12.6005 10.23 12.65L10.39 12.78L10.48 12.87L13.08 14.37C13.2324 14.4564 13.4048 14.5012 13.58 14.5C13.8014 14.5015 14.0171 14.4296 14.1932 14.2953C14.3693 14.1611 14.4959 13.9722 14.5531 13.7583C14.6103 13.5444 14.5948 13.3176 14.5092 13.1134C14.4236 12.9092 14.2726 12.7392 14.08 12.63H14.1Z"
                                            fill="#B1B1B1" />
                                    </svg>
                                    История раундов
                                </h4>
                                <div class="game__history__all__close btn">
                                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.175 10L16.425 4.75834C16.5819 4.60142 16.6701 4.38859 16.6701 4.16667C16.6701 3.94475 16.5819 3.73192 16.425 3.575C16.2681 3.41808 16.0552 3.32993 15.8333 3.32993C15.6114 3.32993 15.3986 3.41808 15.2417 3.575L9.99999 8.825L4.75832 3.575C4.6014 3.41808 4.38857 3.32993 4.16666 3.32993C3.94474 3.32993 3.73191 3.41808 3.57499 3.575C3.41807 3.73192 3.32991 3.94475 3.32991 4.16667C3.32991 4.38859 3.41807 4.60142 3.57499 4.75834L8.82499 10L3.57499 15.2417C3.49688 15.3191 3.43489 15.4113 3.39258 15.5129C3.35027 15.6144 3.32849 15.7233 3.32849 15.8333C3.32849 15.9433 3.35027 16.0523 3.39258 16.1538C3.43489 16.2554 3.49688 16.3475 3.57499 16.425C3.65246 16.5031 3.74463 16.5651 3.84618 16.6074C3.94773 16.6497 4.05665 16.6715 4.16666 16.6715C4.27667 16.6715 4.38559 16.6497 4.48714 16.6074C4.58869 16.5651 4.68085 16.5031 4.75832 16.425L9.99999 11.175L15.2417 16.425C15.3191 16.5031 15.4113 16.5651 15.5128 16.6074C15.6144 16.6497 15.7233 16.6715 15.8333 16.6715C15.9433 16.6715 16.0523 16.6497 16.1538 16.6074C16.2554 16.5651 16.3475 16.5031 16.425 16.425C16.5031 16.3475 16.5651 16.2554 16.6074 16.1538C16.6497 16.0523 16.6715 15.9433 16.6715 15.8333C16.6715 15.7233 16.6497 15.6144 16.6074 15.5129C16.5651 15.4113 16.5031 15.3191 16.425 15.2417L11.175 10Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>
                            <ul class="game__history__all__list">
                                <?
                                    foreach (Model::get_last_coef(30) as $key => $value) {
                                ?>
                                    <li>
                                        <div class="coef <?if(($value>2)&&($value<10)){echo "coef_purple";}elseif($value>=10){echo "coef_toxic";}else{echo "coef_blue";}?>">
                                            <? if($value>=2){echo "<ul class='bublus'><li></li><li></li><li></li><li></li><li></li><li></li></ul>";} ?>
                                            x<?=bcdiv($value, 1,2);?>
                                        </div>
                                    </li>                                       
                                <?
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>




                    <div class="game__board play win before_start">
                      <div class="game__board__preloader">
                            <img src="./img/game/monkey-head.svg" alt="" class="monkey-head">
                                <span class="wait_sec_max" style="display:none;">0</span>
                            <h5>
                                Ожидание <span class="wait_sec" style="display:none;">0</span> следующего раунда
                            </h5>
                            <div class="game__board__preloader__progressbar">
                                <div class="game__board__preloader__progressbar__line" style="--load-time: 10s">
                                    <ul class="game__board__preloader__progressbar__bubles">
                                        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="game__board__sesion">
                            <div class="game__board__sesion__coef">
                                <div class="left_triangle"></div>
                                <div class="right_triangle"></div>
                                <!--svg viewBox="0 0 180 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 0H180L168.643 39.5236C166.18 48.0951 158.339 54 149.421 54H30.5795C21.6611 54 13.8204 48.0951 11.3574 39.5236L0 0Z"
                                        fill="url(#paint0_linear_307_26199)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_307_26199" x1="90" y1="0" x2="90" y2="54"
                                            gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#3F73D7" />
                                            <stop offset="1" stop-color="#3F77E3" />
                                        </linearGradient>
                                    </defs>
                                </svg-->
                                <div style="width: 100%;height: 54px;background: #3f73d9;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;">
                                    <span class="process_game">
                                        x<x class="progress">0</x>
                                    </span>
                                </div>
                            </div>
                            <div class="game__board__sesion__line">
                                <div class="game__board__sesion__element">
                                    <div class="game__board__sesion__monkey">
                                        <img src="./img/game/monkey.svg" alt="">
                                    </div>

                                    <!-- new code 3 -->

                                    <!-- <ul class="game__board__sesion__progressbar">
                                        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                                    </ul> -->

                                    <!-- end new code 3 -->
                                </div>
                            </div>

                            <!-- new code 3 -->

                            <canvas class="game__board__sesion__graph"></canvas>

                            <div class="game__board__sesion__bubbles"></div>


                            <!-- end new code 3 -->

                        </div>

                        
                        <div class="win_notice win_notice1">
                            <div class="left_wn">
                                <div class="title">Вы успели забрать!</div>
                                <div class="coef_wn">x1.62</div>
                            </div>
                            <div class="right_wn">
                                <div class="amount_wn">2268.00</div>
                                <div class="amount_wn_discr">Ваш выигрыш</div>
                            </div>
                        </div>

                        
                        
                        <div class="win_notice win_notice2">
                            <div class="left_wn">
                                <div class="title">Вы успели забрать!</div>
                                <div class="coef_wn">x1.62</div>
                            </div>
                            <div class="right_wn">
                                <div class="amount_wn">2268.00</div>
                                <div class="amount_wn_discr">Ваш выигрыш</div>
                            </div>
                        </div>

                        
                    </div>
                    
                <div class="game__panels">
                        <div class="game__panel">
                            <div class="game__panel__bet__functions">
                                <label class="checkbox">
                                    <input type="checkbox" name="autobet1">
                                    <span></span>
                                    Авто ставка
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="autocash1">
                                    <span></span>
                                    Авто вывод
                                </label>
                                <input type="text"  name="autocashval1" value="x2.0">
                            </div>
                            <div class="bottom-items">
                                    <? if(!isset($_SESSION['user'])){ ?>
                                        <button href="#signup" class="game__panel__btn popuper <? if(isset($_SESSION['user'])){ echo "game_play";}?>">
                                            Ставка
                                        </button>
                                    <? }else{ ?>
                                        <button href="#" class="game__panel__btn <? if(isset($_SESSION['user'])){ echo "game_play";}?>">
                                            Ставка
                                        </button>
                                        <button href="#" class="game__panel__btn <? if(isset($_SESSION['user'])){ echo "cashout";}?> " style="display: none;">
                                            Забрать
                                        </button>
                                    <? } ?>
                                <div class="game__panel__bet">
                                    <div class="game__panel__bet__top">
                                        <button href="#" class="game__panel__bet__minus bet_minus1">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                        </button>
                                        <input type="text" value="100" name="my_bet">
                                        <button href="#" class="game__panel__bet__plus bet_plus1">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 11H13V5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5V11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H11V19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19V13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="game__panel__bet__steps">
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet1">+50</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet1">+50</button>
                                            <? } ?>                                            
                                        </li>
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet1">+100</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet1">+100</button>
                                            <? } ?>                               
                                        </li>
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet1">+200</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet1">+200</button>
                                            <? } ?>                               
                                        </li>
                                        <li>            
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet1">+500</button>
                                            <? }else{ ?>                                
                                                <button href="#" class="click_bet1">+500</button>
                                            <? } ?>                               
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="game__panel"> 
                            <div class="game__panel__bet__functions">
                                <label class="checkbox">
                                    <input type="checkbox" name="autobet2">
                                    <span></span>
                                    Авто ставка
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="autocash2">
                                    <span></span>
                                    Авто вывод
                                </label>
                                <input type="text"  name="autocashval2" value="x2.0">
                            </div>
                            <div class="bottom-items">
                                    <? if(!isset($_SESSION['user'])){ ?>
                                        <button href="#signup" class="game__panel__btn popuper <? if(isset($_SESSION['user'])){ echo "game_play2";}?>">
                                            Ставка
                                        </button>
                                    <? }else{ ?>
                                        <button href="#" class="game__panel__btn <? if(isset($_SESSION['user'])){ echo "game_play2";}?>">
                                            Ставка
                                        </button>
                                        <button href="#" class="game__panel__btn <? if(isset($_SESSION['user'])){ echo "cashout2";}?> " style="display: none;">
                                            Забрать
                                        </button>
                                    <? } ?>
                                <div class="game__panel__bet">
                                    <div class="game__panel__bet__top">
                                        <button href="#" class="game__panel__bet__minus bet_minus2">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                        </button>
                                        <input type="text" value="101" name="my_bet2">
                                        <button href="#" class="game__panel__bet__plus bet_plus2">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 11H13V5C13 4.73478 12.8946 4.48043 12.7071 4.29289C12.5196 4.10536 12.2652 4 12 4C11.7348 4 11.4804 4.10536 11.2929 4.29289C11.1054 4.48043 11 4.73478 11 5V11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H11V19C11 19.2652 11.1054 19.5196 11.2929 19.7071C11.4804 19.8946 11.7348 20 12 20C12.2652 20 12.5196 19.8946 12.7071 19.7071C12.8946 19.5196 13 19.2652 13 19V13H19C19.2652 13 19.5196 12.8946 19.7071 12.7071C19.8946 12.5196 20 12.2652 20 12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11Z"
                                                    fill="#B1B1B1" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="game__panel__bet__steps">
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet2">+50</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet2">+50</button>
                                            <? } ?>                                            
                                        </li>
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet2">+100</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet2">+100</button>
                                            <? } ?>                               
                                        </li>
                                        <li>
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet2">+200</button>
                                            <? }else{ ?>
                                                <button href="#" class="click_bet2">+200</button>
                                            <? } ?>                               
                                        </li>
                                        <li>            
                                            <? if(!isset($_SESSION['user'])){ ?>
                                                <button href="#signup" class="popuper click_bet2">+500</button>
                                            <? }else{ ?>                                
                                                <button href="#" class="click_bet2">+500</button>
                                            <? } ?>                               
                                        </li>
                                    </ul>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer">
            <div class="footer_content">
                <?php
                    if(isset($_SESSION['user'])){
                ?>  
                    <div class="balance_controller_balance footer_balance"><pz class="my_balance"><?=round($user->balance, 2);?></pz>$</div>
                    <div class="balance_controller_replenish footer_replenishment">Пополнить</div>
                    <!-- <div class="balance_controller_withdraw footer_withdraw">Вывод баланса</div> -->
                    <div class="burger">

                        <div class="balance_controller_arrow2 balance_controller_arrow"></div>
                        <div class="balance_controller2 balance_controller">
                            <div class="balance_controller_balance my_balance"><?=round($user->balance, 2);?>$</div>
                            <div class="balance_controller_replenish">Пополнение баланса</div>
                            <div class="balance_controller_withdraw">Вывод баланса</div>
                        </div>
                        
                        <div class="burger_line burger_line1"></div>
                        <div class="burger_line burger_line2"></div>
                        <div class="burger_line burger_line3"></div>
                    </div>
                <?}?>
            </div>
        </div>
    </footer>

    <!-- POPUPS -->
    <!-- SIGN IN -->
    <div class="popup " id="signin">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__close popup__close-btn">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.41 12L19.71 5.71C19.8983 5.5217 20.0041 5.2663 20.0041 5C20.0041 4.7337 19.8983 4.47831 19.71 4.29C19.5217 4.1017 19.2663 3.99591 19 3.99591C18.7337 3.99591 18.4783 4.1017 18.29 4.29L12 10.59L5.71 4.29C5.5217 4.1017 5.2663 3.99591 5 3.99591C4.7337 3.99591 4.4783 4.1017 4.29 4.29C4.1017 4.47831 3.99591 4.7337 3.99591 5C3.99591 5.2663 4.1017 5.5217 4.29 5.71L10.59 12L4.29 18.29C4.19627 18.383 4.12188 18.4936 4.07111 18.6154C4.02034 18.7373 3.9942 18.868 3.9942 19C3.9942 19.132 4.02034 19.2627 4.07111 19.3846C4.12188 19.5064 4.19627 19.617 4.29 19.71C4.38296 19.8037 4.49356 19.8781 4.61542 19.9289C4.73728 19.9797 4.86799 20.0058 5 20.0058C5.13201 20.0058 5.26272 19.9797 5.38458 19.9289C5.50644 19.8781 5.61704 19.8037 5.71 19.71L12 13.41L18.29 19.71C18.383 19.8037 18.4936 19.8781 18.6154 19.9289C18.7373 19.9797 18.868 20.0058 19 20.0058C19.132 20.0058 19.2627 19.9797 19.3846 19.9289C19.5064 19.8781 19.617 19.8037 19.71 19.71C19.8037 19.617 19.8781 19.5064 19.9289 19.3846C19.9797 19.2627 20.0058 19.132 20.0058 19C20.0058 18.868 19.9797 18.7373 19.9289 18.6154C19.8781 18.4936 19.8037 18.383 19.71 18.29L13.41 12Z"
                            fill="#fff" />
                    </svg>
                </div>
                  <h3>
                    Вход
                </h3>
                <form action="/user/login" method="POST">
                    <input type="text" name="login" placeholder="Login">
                    <input type="password" name="password" placeholder="Password">
                    
                    <button type="submit" class="btn">
                        Login
                    </button>
                </form>
                <div class="popup__footer">
                    Нет аккаунта? <a href="#signup" class="popuper popup__close">Зарегистрировать</a>
                </div>



        
            </div>
        </div>
    </div>

    <!-- SIGN UP -->
    <div class="popup" id="signup">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__close popup__close-btn">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.41 12L19.71 5.71C19.8983 5.5217 20.0041 5.2663 20.0041 5C20.0041 4.7337 19.8983 4.47831 19.71 4.29C19.5217 4.1017 19.2663 3.99591 19 3.99591C18.7337 3.99591 18.4783 4.1017 18.29 4.29L12 10.59L5.71 4.29C5.5217 4.1017 5.2663 3.99591 5 3.99591C4.7337 3.99591 4.4783 4.1017 4.29 4.29C4.1017 4.47831 3.99591 4.7337 3.99591 5C3.99591 5.2663 4.1017 5.5217 4.29 5.71L10.59 12L4.29 18.29C4.19627 18.383 4.12188 18.4936 4.07111 18.6154C4.02034 18.7373 3.9942 18.868 3.9942 19C3.9942 19.132 4.02034 19.2627 4.07111 19.3846C4.12188 19.5064 4.19627 19.617 4.29 19.71C4.38296 19.8037 4.49356 19.8781 4.61542 19.9289C4.73728 19.9797 4.86799 20.0058 5 20.0058C5.13201 20.0058 5.26272 19.9797 5.38458 19.9289C5.50644 19.8781 5.61704 19.8037 5.71 19.71L12 13.41L18.29 19.71C18.383 19.8037 18.4936 19.8781 18.6154 19.9289C18.7373 19.9797 18.868 20.0058 19 20.0058C19.132 20.0058 19.2627 19.9797 19.3846 19.9289C19.5064 19.8781 19.617 19.8037 19.71 19.71C19.8037 19.617 19.8781 19.5064 19.9289 19.3846C19.9797 19.2627 20.0058 19.132 20.0058 19C20.0058 18.868 19.9797 18.7373 19.9289 18.6154C19.8781 18.4936 19.8037 18.383 19.71 18.29L13.41 12Z"
                            fill="#fff" />
                    </svg>
                </div>
                <h3>
                    Регистрация
                </h3>
                <form action="/user/register" method="POST">


                <div class="popup__footer">
                    Есть аккаунт? <a href="#signin" class="popuper popup__close">Войти</a>
                </div>

                    <div class="dropdown">
                        <div class="select">
                            <span>
                                <div class="currency-icon">Rs</div>
                                <div class="currency-name">Пакистанская рупия (PKR)</div>
                            </span>
                            <i class="fa fa-chevron-left"></i>
                        </div>
                        <input type="hidden" name="gender">
                        <ul class="dropdown-menu">
                            <li id="1">
                                <div class="currency-icon">DH</div>
                                <div class="currency-name">Дирхам ОАЭ (AED)</div>
                            </li>
                            <li id="2">
                                <div class="currency-icon">֏</div>
                                <div class="currency-name">Армянский драм (AMD)</div>
                            </li>
                            <li id="3">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Аргентинское песо (ARS)</div>
                            </li>
                            <li id="4">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Австралийский доллар (AUD)</div>
                            </li>
                            <li id="5">
                                <div class="currency-icon">₼</div>
                                <div class="currency-name">Азербайджанский манат (AZN)</div>
                            </li>
                            <li id="6">
                                <div class="currency-icon">Tk</div>
                                <div class="currency-name">Бангладешская така (BDT)</div>
                            </li>
                            <li id="7">
                                <div class="currency-icon">R$</div>
                                <div class="currency-name">Бразильский реал (BRL)</div>
                            </li>
                            <li id="8">
                                <div class="currency-icon">Br</div>
                                <div class="currency-name">Белорусский рубль (BYN)</div>
                            </li>
                            <li id="9">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Канадский доллар (CAD)</div>
                            </li>
                            <li id="10">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Чилийское песо (CLP)</div>
                            </li>
                            <li id="11">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Колумбийский песо (COP)</div>
                            </li>
                            <li id="12">
                                <div class="currency-icon">₡</div>
                                <div class="currency-name">Коста-риканский колон (CRC)</div>
                            </li>
                            <li id="13">
                                <div class="currency-icon">$MN</div>
                                <div class="currency-name">Кубинский песо (CUP)</div>
                            </li>
                            <li id="14">
                                <div class="currency-icon">Kč</div>
                                <div class="currency-name">Чешская крона (CZK)</div>
                            </li>
                            <li id="15">
                                <div class="currency-icon">DA</div>
                                <div class="currency-name">Алжирский динар (DZD)</div>
                            </li>
                            <li id="16">
                                <div class="currency-icon">€</div>
                                <div class="currency-name">Евро (EUR)</div>
                            </li>
                            <li id="17">
                                <div class="currency-icon">₾</div>
                                <div class="currency-name">Грузинский лари (GEL)</div>
                            </li>
                            <li id="18">
                                <div class="currency-icon">GH₵</div>
                                <div class="currency-name">Ганский седи (GHS)</div>
                            </li>
                            <li id="19">
                                <div class="currency-icon">HK$</div>
                                <div class="currency-name">Гонконкский доллар (HKD)</div>
                            </li>
                            <li id="20">
                                <div class="currency-icon">Rp</div>
                                <div class="currency-name">Индонезийская рупия (IDR)</div>
                            </li>
                            <li id="21">
                                <div class="currency-icon">₹</div>
                                <div class="currency-name">Индийская рупия (INR)</div>
                            </li>
                            <li id="22">
                                <div class="currency-icon">IQD</div>
                                <div class="currency-name">Иракский динар (IQD)</div>
                            </li>
                            <li id="23">
                                <div class="currency-icon">IRR</div>
                                <div class="currency-name">Иранский реал (IRR)</div>
                            </li>
                            <li id="24">
                                <div class="currency-icon">JD</div>
                                <div class="currency-name">Иорданский динар (JOD)</div>
                            </li>
                            <li id="25">
                                <div class="currency-icon">KSh</div>
                                <div class="currency-name">Кенийский шиллинг (KES)</div>
                            </li>
                            <li id="26">
                                <div class="currency-icon">c</div>
                                <div class="currency-name">Киргизский сом (KGS)</div>
                            </li>
                            <li id="27">
                                <div class="currency-icon">₩</div>
                                <div class="currency-name">Южнокорейская вона (KRW)</div>
                            </li>
                            <li id="28">
                                <div class="currency-icon">KD</div>
                                <div class="currency-name">Кувейтский динар (KWD)</div>
                            </li>
                            <li id="29">
                                <div class="currency-icon">₸</div>
                                <div class="currency-name">Казахстанский тенге (KZT)</div>
                            </li>
                            <li id="30">
                                <div class="currency-icon">Rs</div>
                                <div class="currency-name">Шри-ланкийская рупия (LKR)</div>
                            </li>
                            <li id="31">
                                <div class="currency-icon">L</div>
                                <div class="currency-name">Молдавский лей (MDL)</div>
                            </li>
                            <li id="32">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Мексиканское песо (MXN)</div>
                            </li>
                            <li id="33">
                                <div class="currency-icon">RM</div>
                                <div class="currency-name">Малазийский ринггит (MYR)</div>
                            </li>
                            <li id="34">
                                <div class="currency-icon">N</div>
                                <div class="currency-name">Нигерийская найра (NGN)</div>
                            </li>
                            <li id="35">
                                <div class="currency-icon">RE</div>
                                <div class="currency-name">Непальская рупия (NPR)</div>
                            </li>
                            <li id="36">
                                <div class="currency-icon">OMR</div>
                                <div class="currency-name">Оманский реал (OMR)</div>
                            </li>
                            <li id="37">
                                <div class="currency-icon">B</div>
                                <div class="currency-name">Панамский бальбоа (PAB)</div>
                            </li>
                            <li id="38">
                                <div class="currency-icon">S/</div>
                                <div class="currency-name">Перуанский новый соль (PEN)</div>
                            </li>
                            <li id="39">
                                <div class="currency-icon">PhP</div>
                                <div class="currency-name">Филиппинское песо (PHP)</div>
                            </li>
                            <li id="40">
                                <div class="currency-icon">Rs</div>
                                <div class="currency-name">Пакистанская рупия (PKR)</div>
                            </li>
                            <li id="41">
                                <div class="currency-icon">Zł</div>
                                <div class="currency-name">Польский злотый (PLN)</div>
                            </li>
                            <li id="42">
                                <div class="currency-icon">QR</div>
                                <div class="currency-name">Катарский реал (QAR)</div>
                            </li>
                            <li id="43">
                                <div class="currency-icon">₽</div>
                                <div class="currency-name">Российский рубль (RUB)</div>
                            </li>
                            <li id="44">
                                <div class="currency-icon">FRw</div>
                                <div class="currency-name">Руандийский франк (RWF)</div>
                            </li>
                            <li id="45">
                                <div class="currency-icon">kr</div>
                                <div class="currency-name">Шведская крона (SEK)</div>
                            </li>
                            <li id="46">
                                <div class="currency-icon">S$</div>
                                <div class="currency-name">Сингапурский доллар (SGD)</div>
                            </li>
                            <li id="47">
                                <div class="currency-icon">So</div>
                                <div class="currency-name">Сомалийский шиллинг (SOS)</div>
                            </li>
                            <li id="48">
                                <div class="currency-icon">฿</div>
                                <div class="currency-name">Тайский бат (THB)</div>
                            </li>
                            <li id="49">
                                <div class="currency-icon">C</div>
                                <div class="currency-name">Таджикский сомони (TJS)</div>
                            </li>
                            <li id="50">
                                <div class="currency-icon">₺</div>
                                <div class="currency-name">Турецкая лира (TRY)</div>
                            </li>
                            <li id="51">
                                <div class="currency-icon">TSh</div>
                                <div class="currency-name">Танзанийский шиллинг (TZS)</div>
                            </li>
                            <li id="52">
                                <div class="currency-icon">₴</div>
                                <div class="currency-name">Украинская гривна (UAH)</div>
                            </li>
                            <li id="53">
                                <div class="currency-icon">Ush</div>
                                <div class="currency-name">Угандийский шиллинг (UGX)</div>
                            </li>
                            <li id="54">
                                <div class="currency-icon">$</div>
                                <div class="currency-name">Доллар США (USD)</div>
                            </li>
                            <li id="55">
                                <div class="currency-icon">S</div>
                                <div class="currency-name">Узбекский сум (UZS)</div>
                            </li>
                            <li id="56">
                                <div class="currency-icon">₫</div>
                                <div class="currency-name">Вьетнамский донг (VND)</div>
                            </li>
                            <li id="57">
                                <div class="currency-icon">₣</div>
                                <div class="currency-name">Франк КФА BEAC (XAF)</div>
                            </li>
                            <li id="58">
                                <div class="currency-icon">₣</div>
                                <div class="currency-name">Западноафриканский франк (XOF)</div>
                            </li>
                            <li id="59">
                                <div class="currency-icon">ZK</div>
                                <div class="currency-name">Замбийская квача (ZMW)</div>
                            </li>
                        </ul>
                    </div>
                    <input type="tel" name="phone" class="form__input" id="phone" required>
                    <input type="email" name="login" placeholder="E-mail" required>
                    <div class="password-inpt">
                        <input type="password" class="input-pass" name="password" placeholder="Password" required>
                        <img src="./img/eye.svg" alt="">
                    </div>
                    <label class="container">
                        Я подтверждаю, что я ознакомлен и полностью согласен с <br>
                        <a href="#">Условиями Соглашения об использовании сайта spacemonkey</a>
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                    </label>
                    <button type="submit" class="btn">
                        Зарегистрироваться
                    </button>
                </form>
                <div class="popup__footer">
                    Ужесть аккаунт? <a href="#signin" class="popuper popup__close">Войти</a>
                </div>
           


            </div>
        </div>
    </div>

    <!-- HOW TO PLAY -->
    <div class="popup popup_lg" id="how-to-play">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__close popup__close-btn">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.41 12L19.71 5.71C19.8983 5.5217 20.0041 5.2663 20.0041 5C20.0041 4.7337 19.8983 4.47831 19.71 4.29C19.5217 4.1017 19.2663 3.99591 19 3.99591C18.7337 3.99591 18.4783 4.1017 18.29 4.29L12 10.59L5.71 4.29C5.5217 4.1017 5.2663 3.99591 5 3.99591C4.7337 3.99591 4.4783 4.1017 4.29 4.29C4.1017 4.47831 3.99591 4.7337 3.99591 5C3.99591 5.2663 4.1017 5.5217 4.29 5.71L10.59 12L4.29 18.29C4.19627 18.383 4.12188 18.4936 4.07111 18.6154C4.02034 18.7373 3.9942 18.868 3.9942 19C3.9942 19.132 4.02034 19.2627 4.07111 19.3846C4.12188 19.5064 4.19627 19.617 4.29 19.71C4.38296 19.8037 4.49356 19.8781 4.61542 19.9289C4.73728 19.9797 4.86799 20.0058 5 20.0058C5.13201 20.0058 5.26272 19.9797 5.38458 19.9289C5.50644 19.8781 5.61704 19.8037 5.71 19.71L12 13.41L18.29 19.71C18.383 19.8037 18.4936 19.8781 18.6154 19.9289C18.7373 19.9797 18.868 20.0058 19 20.0058C19.132 20.0058 19.2627 19.9797 19.3846 19.9289C19.5064 19.8781 19.617 19.8037 19.71 19.71C19.8037 19.617 19.8781 19.5064 19.9289 19.3846C19.9797 19.2627 20.0058 19.132 20.0058 19C20.0058 18.868 19.9797 18.7373 19.9289 18.6154C19.8781 18.4936 19.8037 18.383 19.71 18.29L13.41 12Z"
                            fill="#fff" />
                    </svg>
                </div>
                <h3>
                    Как играть
                </h3>
                <p>
                   Space Monkey – новейшее азартное развлечение которое  подойдет новому поколению игроков. Ты можешь выиграть  в несколько раз больше буквально за несколько секунд!  Space Monkey устроен на схеме которую можно проверить  в настоящий момент считается единственной реально работающей  гарантией честности в индустрии азартных игр.
                </p>
              
            </div>
        </div>
    </div>



    <div class="popup popup_lg" id="rules">
        <div class="popup__container">
            <div class="popup__content popup_content2">

                <div class="header_cont_popup">
                    <div class="header_popup">
                        <div class="logo_popup">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0C3.79086 0 2 1.79086 2 4V16C2 18.2091 3.79086 20 6 20H14C16.2091 20 18 18.2091 18 16V4C18 1.79086 16.2091 0 14 0H6ZM4 6.75H9V5.25H4V6.75ZM16 10.75H4V9.25H16V10.75ZM4 14.75H16V13.25H4V14.75Z" fill="#944EF5"/>
                            </svg>
                        </div>

                        <div class="header_popup_title">Правила игры</div>
                    </div>
                
                    <div class="popup__close popup__close-btn popup__close_header">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.41 12L19.71 5.71C19.8983 5.5217 20.0041 5.2663 20.0041 5C20.0041 4.7337 19.8983 4.47831 19.71 4.29C19.5217 4.1017 19.2663 3.99591 19 3.99591C18.7337 3.99591 18.4783 4.1017 18.29 4.29L12 10.59L5.71 4.29C5.5217 4.1017 5.2663 3.99591 5 3.99591C4.7337 3.99591 4.4783 4.1017 4.29 4.29C4.1017 4.47831 3.99591 4.7337 3.99591 5C3.99591 5.2663 4.1017 5.5217 4.29 5.71L10.59 12L4.29 18.29C4.19627 18.383 4.12188 18.4936 4.07111 18.6154C4.02034 18.7373 3.9942 18.868 3.9942 19C3.9942 19.132 4.02034 19.2627 4.07111 19.3846C4.12188 19.5064 4.19627 19.617 4.29 19.71C4.38296 19.8037 4.49356 19.8781 4.61542 19.9289C4.73728 19.9797 4.86799 20.0058 5 20.0058C5.13201 20.0058 5.26272 19.9797 5.38458 19.9289C5.50644 19.8781 5.61704 19.8037 5.71 19.71L12 13.41L18.29 19.71C18.383 19.8037 18.4936 19.8781 18.6154 19.9289C18.7373 19.9797 18.868 20.0058 19 20.0058C19.132 20.0058 19.2627 19.9797 19.3846 19.9289C19.5064 19.8781 19.617 19.8037 19.71 19.71C19.8037 19.617 19.8781 19.5064 19.9289 19.3846C19.9797 19.2627 20.0058 19.132 20.0058 19C20.0058 18.868 19.9797 18.7373 19.9289 18.6154C19.8781 18.4936 19.8037 18.383 19.71 18.29L13.41 12Z"
                                fill="#fff" />
                        </svg>
                    </div>
                </div>

                <div class="below_header_popup">
                    <div class="left_below_popup">
                        Luсky Jet is the latest gambling entertainment that will suit a new generation of players. You can win several times more in just a few seconds! Luсky Jet is arranged on a scheme that can be verified at the moment is considered the only really working guarantee of honesty in the gambling industry.
                    </div>
                    <div class="right_below_popup">
                        <div class="button_below_popup">More detailed <div><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 9C1 13.416 4.584 17 9 17C13.416 17 17 13.416 17 9C17 4.584 13.416 1 9 1C4.584 1 1 4.584 1 9ZM8 14V13.6C8 13.1582 8.35817 12.8 8.8 12.8H9.2C9.64183 12.8 10 13.1582 10 13.6V14C10 14.4418 9.64183 14.8 9.2 14.8H8.8C8.35817 14.8 8 14.4418 8 14ZM10.736 9.136C10.3078 9.57015 9.99897 9.94682 9.86868 10.6046C9.86267 10.6349 9.85695 10.6698 9.85151 10.7092C9.79694 11.1051 9.45862 11.4 9.059 11.4H9C8.5769 11.4 8.23392 11.057 8.23392 10.6339C8.23392 10.6122 8.23484 10.5905 8.2367 10.5689C8.24335 10.4908 8.25057 10.4317 8.25834 10.3917C8.38209 9.75417 8.69604 9.18207 9.136 8.736L10.128 7.728C10.424 7.44 10.6 7.04 10.6 6.6C10.6 5.72 9.88 5 9 5C8.44083 5 7.94625 5.29071 7.65996 5.72846C7.60931 5.8059 7.56355 5.90967 7.52268 6.03977C7.41795 6.37317 7.10892 6.6 6.75946 6.6H6.6C6.22273 6.6 5.91689 6.29416 5.91689 5.91689C5.91689 5.86612 5.92256 5.81549 5.93379 5.76597C5.98217 5.5524 6.03708 5.37977 6.09851 5.24807C6.60783 4.15623 7.7152 3.4 9 3.4C10.768 3.4 12.2 4.832 12.2 6.6C12.2 7.304 11.912 7.944 11.456 8.4L10.736 9.136Z" fill="#948AC5"/></svg></div>
                        </div>
                    </div>
                </div>

                <div class="main_content_popup_cont">
                    <div class="images_popup">
                        <div class="image_popup">
                            <img src="https://aviator.gamedev.1win.cloud/assets/media/059472036026cc6c371646a7665f6636.png" alt="">
                            <div class="image_popup_description">
                                Enter the required amount and click the "BID" button
                            </div>
                        </div>
                        <div class="image_popup">
                            <img src="https://aviator.gamedev.1win.cloud/assets/media/2cdaa64a698bf86e7272acdd5ad0aace.png" alt="">
                            <div class="image_popup_description">
                                Watch how your plane is planning and the coefficient is growing
                            </div>
                        </div>
                        <div class="image_popup">
                            <img src="https://aviator.gamedev.1win.cloud/assets/media/af9832cb258ccd9e282b1841619f8576.png" alt="">
                            <div class="image_popup_description">
                                Withdraw before the plane disappears and win X times more!
                            </div>
                        </div>
                    </div>

                    <div class="main_content_popup">
                        However, do not forget that you have time limits. You need to withdraw the funds before Lucky Joe leaves, otherwise you will lose your bet. Playing Luсky Jet is pure excitement! Here you take risks and win. It all depends on you!
                        How to play and what are the rules?
                        To place a bet, you need to select the desired amount and click on the "Bet" button.
                        At the same time, there is no need to limit yourself to only one bet at a time. You can place two bets at the same time using both the left and right betting panel.
                        To withdraw the winnings, you need to click the "Withdrawal" button. Your winnings are made up of the aggregate of your bet multiplied by the cashout multiplier.
                        If you do not make a Conclusion before Lucky Joe flies away, then the bet will be lost.
                        Auto Bid and Auto Withdrawal
                        An automatic bet can be activated on the panel of any bet if you tick the "Auto bet" line. In this case, bets are placed automatically. Nevertheless, in order to withdraw the winnings, you still need to press the "Withdrawal" button for each round.
                        If you want to fully automate the game, then it is possible to configure automatic withdrawal of winnings. To do this, you need to activate the "Auto Withdrawal" on the betting panel. Then the funds will be automatically withdrawn when the coefficient you set is reached.
                        The interface of our game
                        Live Bets and Statistics
                        On the left (if you use the mobile interface, then under the betting panel) is the "Live Bets" panel. It displays the bets that were made in the current round.
                        The "My Bets" panel contains information about bets made and withdrawals for the entire duration of the game.
                        The "Top" panel contains game statistics. Here you can study the winnings of other players both in terms of the amount and the cashing coefficient. So you can see the highest coefficients in the round.
                        In-game chat
                        On the right (if you use the mobile interface, then in the upper right corner) there is a general chat panel. It is designed to communicate with other players. In addition, information about receiving large winnings is automatically posted in the chat.
                        Working with technical problems
                        In the event of a break in the Internet connection, the game will independently cash out the bet on the coefficient at the time of the break. The amount of winnings will be added to the player's balance.
                        If a malfunction occurs on the gaming equipment or gaming software, then all bets and payouts will be canceled. At the same time, the bets are reimbursed to the affected players in full.
                    </div>

                    <div class="fotter_popup">

                    </div>
                </div>
              
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="./js/libs/simplebar/simplebar.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/app.js"></script>

    <!-- CHANGE STATE -->
    <script>
        function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function sleep_preloader() {
            await sleep(3000);
            $('.preloader').fadeOut(500);
        }

        $(document).ready(function(){
            sleep_preloader();
        });
    </script>
    <script>
        
        $('.mobile-header-menu').click(function() {
            $('.menu-item').toggleClass('active');
        });

        // new code 3

        $(".mobile-header-menu").click(e => e.stopPropagation());
        $(".menu-item").click(e => e.stopPropagation());
        $(document).click((e) => {
            $('.menu-item').removeClass('active');

            $('.balance_controller_arrow1').removeClass('hoverActive');
            $('.balance_controller1').removeClass('hoverActive');
            $('.balance_controller_arrow2').removeClass('hoverActive');
            $('.balance_controller2').removeClass('hoverActive');
        })

        // end new code 3

    </script>

    <!-- new code 3 -->

    <script>
        document.querySelector(".header__button__balance").onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
            document.querySelector(".balance_controller_arrow").classList.toggle("hoverActive");
            document.querySelector(".balance_controller").classList.toggle("hoverActive");
        }

        document.querySelector(".balance_controller").onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
        }
        document.querySelector(".balance_controller_arrow").onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
        }




        document.querySelector(".burger").onclick = (e) => {
            e.stopPropagation();
            document.querySelector(".balance_controller_arrow2").classList.toggle("hoverActive");
            document.querySelector(".balance_controller2").classList.toggle("hoverActive");
        }

        document.querySelector(".balance_controller2").onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
        }
        document.querySelector(".balance_controller_arrow2").onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
        }
    </script>

    

    <!-- end new code 3 -->
</body>

</html>