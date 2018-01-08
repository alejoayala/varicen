<template>
    <!-- sidebar menu (Menu de Opciones Izquierda) -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <!-- tabla module - type:module -->
        <h3>General</h3>
        <ul class="nav side-menu" v-if="listMenu">
          <router-link v-for="route in listMenu" v-if="route.options.length == 0 || route.menu_internal == 1" tag="li" :to="{ name: route.name_router}" :key="route.id">
            <a><i :class="[route.icono]"></i>{{ route.name_template }}</a>
          </router-link>
          <li v-for="route in listMenu" v-if="route.options.length > 0 && route.menu_internal == 0" :key="route.id">
            <a><i :class="[route.icono]"></i>{{ route.name_template }}<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <router-link v-for="subroute in route.options" v-if="subroute.suboptions.length == 0" tag="li" :to="{ name: subroute.name_router}" :key="subroute.id">
                <a>{{ subroute.name_template }}</a>
              </router-link> 
              <li v-for="subroute in route.options" v-if="subroute.suboptions.length > 0" :key="subroute.id">
                <a>{{ subroute.name_template }}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <router-link v-for="subrouteop in subroute.suboptions" :key="subrouteop.options.id" class="sub_menu" tag="li" :to="{ name: subrouteop.options.name_router }" ><a>{{ subrouteop.options.name_template}}</a></router-link>
                </ul>                
              </li>             
            </ul>
          </li>
        </ul>
        <div v-if="listMenu.length == 0" class="text-center pt-20">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
            <span>Cargando...</span>
        </div>

      </div>

    </div>
    <!-- /sidebar menu -->
</template>
<script>
import { mapState, mapGetters } from 'vuex'

  export default {
    name: 'navbarmenu',
    data () {
      return {
        listMenu : []
      }
    },
    computed: {
        ...mapState(['profile_user']),
    },   
    created() {
      this.$store.dispatch('LOAD_PROFILE_USER')      
    },
    updated(){
      this.getMenuClick()

    },
    watch:{
      profile_user: function(newVal){
        if(newVal != 'undefined' && newVal != null){
          this.listMenu = this.profile_user
        }
        if(newVal == null){
          this.listMenu = []
        }
      }
    },    
    methods: {
      getMenuClick() {
          var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
              $SIDEBAR_MENU = $('#sidebar-menu'),
              $BODY = $('body'),
              $MENU_TOGGLE = $('#menu_toggle'),
              $SIDEBAR_FOOTER = $('.sidebar-footer'),
              $LEFT_COL = $('.left_col'),
              $RIGHT_COL = $('.right_col'),
              $NAV_MENU = $('.nav_menu'),
              $FOOTER = $('footer');
          // Sidebar

          // TODO: This is some kind of easy fix, maybe we can improve this
          var setContentHeight = function () {
            // reset height
            $RIGHT_COL.css('min-height', $(window).height());

            var bodyHeight = $BODY.outerHeight(),
              footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
              leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
              contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

            // normalize content
            contentHeight -= $NAV_MENU.height() + footerHeight;

            $RIGHT_COL.css('min-height', contentHeight);
          };

            $SIDEBAR_MENU.find('a').on('click', function(ev) {
                  //console.log('clicked - sidebar_menu');
                  var $li = $(this).parent();

                  if ($li.is('.active')) {
                      $li.removeClass('active active-sm');
                      $('ul:first', $li).slideUp(function() {
                          setContentHeight();
                      });
                  } else {
                      // prevent closing menu if we are on child menu
                      if (!$li.parent().is('.child_menu')) {
                          $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                          $SIDEBAR_MENU.find('li ul').slideUp();
                      }else
                      {
                  if ( $BODY.is( ".nav-sm" ) )
                  {
                    $SIDEBAR_MENU.find( "li" ).removeClass( "active active-sm" );
                    $SIDEBAR_MENU.find( "li ul" ).slideUp();
                  }
                }
                      $li.addClass('active');

                      $('ul:first', $li).slideDown(function() {
                          setContentHeight();
                      });
                  }
              });

          // toggle small or large menu
          $MENU_TOGGLE.on('click', function() {
              //console.log('clicked - menu toggle');

              if ($BODY.hasClass('nav-md')) {
                $SIDEBAR_MENU.find('li.active ul').hide();
                $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
              } else {
                $SIDEBAR_MENU.find('li.active-sm ul').show();
                $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
              }

            $BODY.toggleClass('nav-md nav-sm');

            setContentHeight();

            $('.dataTable').each ( function () { $(this).dataTable().fnDraw(); });
          });

            // check active menu
            $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

            $SIDEBAR_MENU.find('a').filter(function () {
              return this.href == CURRENT_URL;
            }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
              setContentHeight();
            }).parent().addClass('active');

            // recompute content when resizing
/*             $(window).smartresize(function(){
              setContentHeight();
            }); */

            setContentHeight();

            // fixed sidebar
            if ($.fn.mCustomScrollbar) {
              $('.menu_fixed').mCustomScrollbar({
                autoHideScrollbar: true,
                theme: 'minimal',
                mouseWheel:{ preventDefault: true }
              });
            }
      }

    }
  }
</script>
<style>

</style>
