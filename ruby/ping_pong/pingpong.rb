class Fixnum
    define_method :ping_pong do
        output = []
        iterations = (0..self)

        iterations.each do |time|
            if time === 0
                output.push(time)
            elsif time.%(5) === 0 && time.%(3) === 0
                output.push("ping-pong")
            elsif time.%(5) === 0
                output.push("pong")
            elsif time.%(3) === 0
                output.push("ping")
            else
                output.push(time)
            end
        end
        output
    end
end
