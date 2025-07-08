import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axios from "axios";
import "./WorkoutList.css";

function Workouts() {
  const [workouts, setWorkouts] = useState([]);
  const [error, setError] = useState("");

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/workouts", { withCredentials: true })
      .then((response) => {
        setWorkouts(response.data);
      })
      .catch((error) => {
        console.error("Error fetching workouts:", error);
        setError("You are not authorized. Please login again.");
      });
  }, []);

  return (
    <div className="workout-list-container">
      <header className="workout-header">
        <h1>My Workouts</h1>
        <Link to="/add-workout" className="add-button">
          + Add Workout
        </Link>
      </header>

      {error && <p style={{ color: "red" }}>{error}</p>}

      <div className="workout-grid">
        {workouts.length === 0 ? (
          <p>No workouts yet. Click the button to add one!</p>
        ) : (
          workouts.map((workout) => (
            <div key={workout.id} className="workout-card">
              <h2>{workout.name}</h2>
              <p><strong>Type:</strong> {workout.type}</p>
              <p><strong>Reps:</strong> {workout.reps} | <strong>Sets:</strong> {workout.sets}</p>
              <p><strong>Weight:</strong> {workout.weight}kg</p>
              <p><strong>Duration:</strong> {workout.duration} min</p>
              <p><strong>Date:</strong> {workout.date}</p>
            </div>
          ))
        )}
      </div>
    </div>
  );
}

export default Workouts;


