import React, { Component } from 'react';
import $ from 'jquery'
import 'fullcalendar/dist/fullcalendar.css';
import 'fullcalendar/dist/fullcalendar.js';

class App extends Component {

  componentDidMount() {
    $('#calendar').fullCalendar({events: this.props.events})
  }
  
  render() {
    return (
      <div className="App">
          I'm REACT!
          <div id="calendar"></div>
      </div>
    );
  }
}

export default App;
