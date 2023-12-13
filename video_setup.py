import cv2
import sys
from moviepy.editor import VideoFileClip

filename = sys.argv[1]
userinfo = sys.argv[2]



def add_text_to_video(input_video_path, output_video_path, text):
    video_capture = cv2.VideoCapture(input_video_path)

    # Get video properties
    fps = video_capture.get(cv2.CAP_PROP_FPS)
    frame_width = int(video_capture.get(cv2.CAP_PROP_FRAME_WIDTH))
    frame_height = int(video_capture.get(cv2.CAP_PROP_FRAME_HEIGHT))
    total_frames = int(video_capture.get(cv2.CAP_PROP_FRAME_COUNT))
    codec = cv2.VideoWriter_fourcc(*'mp4v')

    # Create VideoWriter object to save the output video
    video_writer = cv2.VideoWriter(output_video_path, codec, fps, (frame_width, frame_height))

    # Loop through each frame
    for i in range(total_frames):
        ret, frame = video_capture.read()
        if not ret:
            break

        # Add text to the frame
        cv2.putText(frame, text, (50, 50), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 255, 255), 2)

        # Write the modified frame to the output video
        video_writer.write(frame)

    # Release VideoCapture and VideoWriter
    video_capture.release()
    video_writer.release()

def merge_video_with_audio(video_path, audio_path, output_path):
    video_clip = VideoFileClip(video_path)
    audio_clip = VideoFileClip(audio_path).audio

    video_with_audio = video_clip.set_audio(audio_clip)

    video_with_audio.write_videofile(output_path, codec='libx264', audio_codec='aac')

# Example usage
 # Replace with your audio file

add_text_to_video(filename, 'output_video.mp4', userinfo)
merge_video_with_audio('output_video.mp4', filename, 'final_video_with_audio.mp4')
