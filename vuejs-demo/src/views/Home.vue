<template>
    <div class="home-page">
        <div class="banner">
            <div class="container">
                <h3 class="logo-font" style="text-align: center;">Tell us your tastes, we will handpick and send you a
                    phone case every month.</h3>

                <p style="text-align: center;">CONNECT WITH US.WE ARE SOCIAL FIRST, JUST LIKE YOU</p>

                <p style="text-align: center;">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true" style="margin-left: 10px;"></i>
                    <i class="fa fa-share-alt" aria-hidden="true" style="margin-left: 10px;"></i>
                </p>

                <p style="text-align: center; ">
                    <button class="btn btn-lg btn-primary pull-xs-center"
                            style="background-color: #D99999;border-color: #D99999;">SUBSCRIBE NOW
                    </button>
                </p>
            </div>
        </div>
        <div class="banner" style="background-color: white;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1 banner">
                        <div><b>Device</b></div>
                        <hr>
                        <div class="checkbox-list">
                            <label><input type="checkbox" id="use_loyalty_points" name="use_loyalty_points">   X </label>
                        </div>
                        <div class="checkbox-list">
                            <label><input type="checkbox" id="use_loyalty_points" name="use_loyalty_points">    5C </label>
                        </div>
                        <div class="checkbox-list">
                            <label><input type="checkbox" id="use_loyalty_points" name="use_loyalty_points">    6S </label>
                        </div>
                        <hr>
                        <div><b>Taste</b></div>
                    </div>
                    <div class="col-md-11">
                            <div id="myCarousel" class="carousel slide visible-lg visible-md" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                  <li data-target="#myCarousel"  v-for="(item, key, index) in tags.DATA" v-bind:data-slide-to="key" v-if="key===0" class="active"></li>
                                  <li data-target="#myCarousel"  v-for="(item, key, index) in tags.DATA" v-bind:data-slide-to="key" v-if="key!=0" ></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                  <div v-for="(item, key, index) in tags.DATA" v-if="key===0" class="item active">
                                     <img class="img-responsive":src="item.image" alt="First slide" style="width:20% !important;">
                                   </div>
                                  <div v-for="(item, key, index) in tags.DATA" v-if="key!=0"  class="item">

                                      <img class="img-responsive":src="item.image" alt="First slide" style="width:20% !important;">

                                  </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                    </div>
                        <div id="myCarousel" class="carousel slide visible-sm visible-xs" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                              <div class="item active">
                                <img src="http://www.prepbootstrap.com/Content/images/template/productslider/product_003.jpg" alt="Los Angeles" style="width:100%;">
                              </div>

                              <div class="item">
                                <img src="http://www.prepbootstrap.com/Content/images/template/productslider/product_002.jpg" alt="Chicago" style="width:100%;">
                              </div>

                              <div class="item">
                                <img src="http://www.prepbootstrap.com/Content/images/template/productslider/product_001.jpg" alt="New york" style="width:100%;">
                              </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
  import { mapGetters } from 'vuex'
  import RwvTag from '@/components/VTag'
  import { FETCH_TAGS } from '@/store/actions.type'

  export default {
    name: 'home',
    components: {
      RwvTag
    },
    mounted () {
      this.$store.dispatch(FETCH_TAGS)
    },
    computed: {
      ...mapGetters([
        'isAuthenticated',
        'tags'
      ]),
      tag () {
        return this.$route.params.tag
      }
    }
  }
</script>
