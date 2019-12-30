<div id="search-form" class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Procure seu auto</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label>Palavra-chave</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Palavra-chave">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Tipo</label>
              <select id="Type" class="form-control form-control-lg form-control-a" v-model="AutoSearch.Type" v-on:change="ChangeBrands();">
                <option>Carros</option>
                <option>Motos</option>
                <option>Clássicos</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="make">Marca</label>
              <select id="make" class="form-control form-control-lg form-control-a" v-model.lazy="AutoSearch.Brand">
                <option v-for="Brand in CurrentBrands">{{ Brand }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="model">Modelo</label>
              <input id="model" type="text" class="form-control form-control-lg form-control-a" v-model="AutoSearch.Model" placeholder="Ex. Corsa, Opala, Gol">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="trimlevel">Versão</label>
              <input id="trimlevel" type="text" class="form-control form-control-lg form-control-a" v-model="AutoSearch.Version" placeholder="Ex. LTZ, GTI, GSi, SS">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="minyear">Ano Min.</label>
              <select id="minyear" class="form-control form-control-lg form-control-a" v-model="AutoSearch.MinYear">
                <option>Todos</option>
                <option v-for="Year in CurrentYears">{{ Year }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="maxyear">Ano Máx.</label>
              <select id="maxyear" class="form-control form-control-lg form-control-a" v-model="AutoSearch.MaxYear">
                <option>Todos</option>
                <option v-for="Year in CurrentYears">{{ Year }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="minprice">Preço Min.</label>
              <input type="number" class="form-control form-control-lg form-control-a" v-model="AutoSearch.MinPrice" placeholder="Preço mínimo">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="maxprice">Preço Máx.</label>
              <input type="number" class="form-control form-control-lg form-control-a" v-model="AutoSearch.MaxPrice" placeholder="Preço máximo">
            </div>
          </div>
          <div class="col-md-12">
            <button type="button" class="btn btn-b w-100 mb-1" v-on:click="SearchAuto();">Procurar auto</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    var app_search = new Vue({
      el: "#search-form",
      data: {
        CurrentBrands: [],
        CurrentYears: [],
        AutoSearch: {
          Type: "Carros",
          Brand: "",
          Model: "",
          Version: "",
          MinYear: "",
          MaxYear: "",
          MinPrice: "",
          MaxPrice: ""
        },
        CarBrands: ["Alfa Romeo", "Asia", "Audi", "BMW", "Chana", "Chery", "Chevrolet", "Chrysler", "Citroën", "Dodge", "Effa", "Engesa", "Fiat", "Ford", "Gurgel", "Hafei Towner", "Honda", "Hummer", "Hyundai", "JAC", "Jaguar", "Jeep", "Kia", "Lada", "Land Rover", "Lexus", "Lifan", "Mercedes-Benz", "Mitsubishi", "Nissan", "Peugeot", "Porsche", "Renault", "Suzuki", "Subaru", "Toyota", "Troller", "Volkswagen", "Volvo"],
        MotorcycleBrands: ["Agrale", "Amazonas", "BMW", "Bombardier", "Dafra", "Ducati", "Garelli", "Gas Gas", "Harley Davidson", "Honda", "Husqvarna", "Indian", "Kasinski", "Kawasaki", "KTM", "Royal Enfield", "Shineray", "Sundown", "Suzuki", "Triumph", "Vespa", "Yamaha"],
        ClassicsBrands: ["Alfa Romeo", "Bentley", "BMW", "Buick", "Cadillac", "Chevrolet", "Chrysler", "DKW", "Dodge", "Ferrari", "Fiat", "Ford", "Jaguar", "Jeep", "Gordini", "Lamborghini", "Land Rover", "Lincoln", "Mercedes-Benz", "MINI", "Oldsmobile", "Plymouth", "Pontiac", "Porsche", "Volkswagen"],
        CarYears: [],
        ClassicYears: [],
        MotorcycleYears: []
      },
      methods: {
        ChangeBrands: function() {
          if (this.AutoSearch.Type === "Carros") {
            this.CurrentBrands = this.CarBrands;
            this.CurrentYears = this.CarYears;
          } else if (this.AutoSearch.Type === "Motos") {
            this.CurrentBrands = this.MotorcycleBrands;
            this.CurrentYears = this.MotorcycleYears;
          } else if (this.AutoSearch.Type === "Clássicos") {
            this.CurrentBrands = this.ClassicsBrands;
            this.CurrentYears = this.ClassicYears;
          }
          this.AutoSearch.Brand = this.CurrentBrands[0];
          this.AutoSearch.MinYear = "Todos";
          this.AutoSearch.MaxYear = "Todos";
        },
        SearchAuto: function() {
          location.href = "classifieds.html?vehicle=" + this.AutoSearch.Type + "&brand=" + this.AutoSearch.Brand + "&model=" + this.AutoSearch.Model + "&version=" + this.AutoSearch.Version + "&minyear=" + this.AutoSearch.MinYear + "&maxyear=" + this.AutoSearch.MaxYear + "&minprice=" + this.AutoSearch.MinPrice + "&maxprice=" + this.AutoSearch.MaxPrice;
        }
      },
      mounted: function() {
        this.ChangeBrands();
        for (var i = 0; i < (new Date().getFullYear()) - 1981 + 1; i++)
          this.CarYears[i] = 1981 + i;
        for (var i = 0; i < (new Date().getFullYear()) - 1885; i++)
          this.MotorcycleYears[i] = 1885 + i;
        for (var i = 0; i < 1981 - 1870; i++)
          this.ClassicYears[i] = 1870 + i;
        
        this.CarYears.reverse();
        this.MotorcycleYears.reverse();
        this.ClassicYears.reverse();
      }
    });
  </script>